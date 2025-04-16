<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Token;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\TokenPurchaseEmail;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {  

        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'buyTokens' => 'required|string|max:255',
            'service_id' => 'required|array', 
            'service_names.*' => 'required|string|max:255',
            'tokens' => 'required|array',
            'tokens.*' => 'required|numeric|min:1',
        ]);


        $user = User::find(auth()->id());

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->customerAddress()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'company_name' => $request->company_name,
                'gst_number' => $request->gst_number
            ]
        );

        try {
            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

            $amountInPaise = $validated['amount'] * 100;

            $orderData = [
                'amount' => $amountInPaise,
                'currency' => 'INR',
                'receipt' => 'order_rcptid_' . uniqid(),
                'payment_capture' => 1,
            ];
            $razorpayOrder = $api->order->create($orderData);

            $tokensToBuy = $validated['buyTokens'];
            // Convert arrays to comma-separated strings
            $service_namesString = implode(',', $validated['service_id']);
            $tokensString = implode(',', $validated['tokens']);

            $order = Order::create([
                'user_id' => $user->id,
                'razorpay_order_id' => $razorpayOrder['id'],
                'amount' => $validated['amount'],
                'currency' => 'INR',
                'status' => 'pending',
                'tokens_purchased' => $tokensToBuy,
                'service_id' => $service_namesString, // Save as comma-separated string
                'tokens' => $tokensString, // Save as comma-separated string
            ]);

            Log::info("Razorpay order created successfully", [
                'order_id' => $razorpayOrder['id'],
                'amount' => $amountInPaise,
                'tokens_purchased' => $tokensToBuy,
                'service_id' => $service_namesString, // Log the string version
                'currency' => 'INR',
            ]);

            return response()->json([
                'orderId' => $razorpayOrder['id'],
                'amount' => $validated['amount'],
            ], 201);
        } catch (\Exception $e) {
            Log::error("Error creating Razorpay order", [
                'error_message' => $e->getMessage(),
                'user_id' => $user->id,
            ]);

            return response()->json(['error' => 'Failed to create order'], 500);
        }
    }


    public function initiatePayment($orderId)
    {
        $order = Order::findOrFail($orderId);

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $razorpayOrder = $api->order->create([
            'amount' => $order->amount * 100,
            'currency' => 'INR',
            'receipt' => 'order_rcptid_' . $order->id,
        ]);

        $order->razorpay_order_id = $razorpayOrder->id;
        $order->save();

        return view('payment', ['order' => $razorpayOrder]);
    }

    public function paymentCallback(Request $request)
    {
        // dd($request->all());
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        $razorpayPaymentId = $request->razorpay_payment_id;
        $razorpayOrderId = $request->razorpay_order_id;
        $razorpaySignature = $request->razorpay_signature;

        if ($this->verifySignature($razorpayPaymentId, $razorpayOrderId, $razorpaySignature)) {
            $order = Order::where('razorpay_order_id', $razorpayOrderId)->first();

            // dd($order);

            if (!$order) {
                Log::error('Order not found', ['razorpay_order_id' => $razorpayOrderId]);
                return response()->json(['error' => 'Order not found'], 404);
            }

            try {
                $payment = $api->payment->fetch($razorpayPaymentId);

                if ($payment->status === 'captured') {
                    $paymentRecord = new Payment();
                    $paymentRecord->order_id = $order->id;
                    $paymentRecord->razorpay_payment_id = $razorpayPaymentId;
                    $paymentRecord->razorpay_order_id = $razorpayOrderId;
                    $paymentRecord->status = 'success';
                    $paymentRecord->amount = $order->amount;
                    $paymentRecord->currency = $order->currency;
                    $paymentRecord->save();

                    $numberOfTokens = $order->tokens_purchased;
                    // dd($numberOfTokens); 
                    $user = User::find($order->user_id);
                    $expiresAt = Carbon::now()->addDays(30);

                    $tokens = [];
                    $services = explode(',', $order->service_id);
                    $tokensCount = explode(',', $order->tokens);

                    foreach ($services as $index => $service) {
                        $numberOfTokensForService = (int) $tokensCount[$index];  
                    
                        for ($i = 0; $i < $numberOfTokensForService; $i++) {
                            $newToken = new Token();
                            $newToken->user_id = $user->id;
                            $newToken->service_id = $service; 
                            $newToken->token = Str::random(32); 
                            $newToken->expires_at = $expiresAt;
                            $newToken->status = 'active';
                            $newToken->order_id = $order->id;
                            $newToken->save();
                    
                            $tokens[] = $newToken;
                        }
                    }

                    

                    // Send the email with the PDF attachment and log success/failure
                    try {
                        Mail::to($user->email)->send(new TokenPurchaseEmail($user, $tokens,$order));
                        Log::info('Token purchase email sent successfully', ['user_email' => $user->email]);
                    } catch (\Exception $e) {
                        Log::error('Failed to send token purchase email', [
                            'error_message' => $e->getMessage(),
                            'user_email' => $user->email,
                        ]);
                    }
                    $order->status = 'paid';
                    $order->save();

                    return response()->json(['success' => true, 'message' => 'Payment successful','payment_id'=> $razorpayPaymentId]);
                } else {
                    Log::error('Payment failed', ['razorpay_payment_id' => $razorpayPaymentId]);
                    return response()->json(['error' => 'Payment failed','payment'=> $razorpayOrderId], 400);
                }
            } catch (\Exception $e) {
                Log::error('Error verifying payment', [
                    'error_message' => $e->getMessage(),
                    'razorpay_payment_id' => $razorpayPaymentId,
                    'razorpay_order_id' => $razorpayOrderId,
                ]);

                return response()->json(['error' => $e->getMessage(),'payment'=> $razorpayPaymentId], 500);
            }
        } else {
            Log::error('Signature verification failed', [
                'razorpay_payment_id' => $razorpayPaymentId,
                'razorpay_order_id' => $razorpayOrderId,
                'razorpay_signature' => $razorpaySignature
            ]);
            return response()->json(['error' => 'Payment verification failed'], 400);
        }
    }

    private function verifySignature($razorpayPaymentId, $razorpayOrderId, $razorpaySignature)
    {
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        $attributes = [
            'razorpay_order_id' => $razorpayOrderId,
            'razorpay_payment_id' => $razorpayPaymentId,
            'razorpay_signature' => $razorpaySignature
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);
            return true; // Signature is valid
        } catch (\Exception $e) {
            Log::error('Payment signature verification failed', [
                'error_message' => $e->getMessage(),
                'razorpay_order_id' => $razorpayOrderId,
                'razorpay_payment_id' => $razorpayPaymentId
            ]);
            return false; // Signature is invalid
        }
    }
    public function success(Request $request)
    {
        $payment_result = Payment::where('razorpay_payment_id', $request->payment_id)->first();
           
        // These are example fields; adjust based on actual payment response structure
    $paymentId = $payment_result->razorpay_payment_id; // Razorpay Payment ID
    $status = $payment_result->status; // captured
    $amount = $payment_result->amount; // in paisa
    $createdAt = $payment_result->created_at; // timestamp
    $order_id = $payment_result->order_id; // Order Id
    session()->pull('cart');
    return view('payment.success', compact(
        'paymentId',
        'status',
        'amount',
        'createdAt',
        'order_id',
    ));
    }
    public function failure()
    {
        return view('payment.failure');
    }
}
