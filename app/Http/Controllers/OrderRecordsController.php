<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Token;
use App\Models\User;
use App\Models\Service;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Str;
use Carbon\Carbon;
use App\Mail\TokenAssign;
use Illuminate\Support\Facades\Mail;

class OrderRecordsController extends Controller
{
    public function ordersDetails()
    {
        $data = Order::with('user', 'tokens')
        ->orderBy('created_at', 'desc')->paginate(50);
        // dd($data);
        return view('admin.ordersdetails.list', compact('data'));
    }
    public function show($id)
{
    $order = Order::with('user', 'tokens')->findOrFail($id);

    $array_token = []; // Initialize the array outside the condition
    $total_token = 0;

if ($order) {
    $service_names = explode(',', $order->service_names);
    $tokens = explode(',', $order->tokens);
    $User = User::find($order->user_id)->first();
    $user_name = $User->name;

    foreach ($service_names as $key => $value) {
        $service_token = Token::select('service_type', 'token', 'status')
            ->where('user_id', $order->user_id)
            ->where('order_id', $order->id)
            ->where('service_type', $value)
            ->get();

        // Push service tokens to the array, only if not empty
        if (!$service_token->isEmpty()) {
            // Here, you can push only the necessary information from the $service_token collection, like the token details
            $array_token[] = $service_token->toArray(); // Or you can push specific attributes like $service_token->pluck('token')
        }

        // Ensure that the $tokens array has a valid index before accessing it
        if (isset($tokens[$key])) {
            $total_token += (int)$tokens[$key]; // Ensure it's treated as an integer
        }
    }

}

    // Return a structured JSON response for AJAX
    return response()->json([
        'id' => $order->id,
        'user' => $user_name ? $User->name:null,
        'service_tokens' => $array_token,
        'total_token' =>  $total_token?$total_token:0
    ]);
}


//  For Token Assing
public function AssignTokensView(Request $request, $user_id) {
    $user = User::findOrFail($user_id);
    $address = CustomerAddress::where('user_id',$user_id)->first();
    $services  = Service::where('status',1)->get();
        return view('admin.user.tokenassign', compact('user','services','address'));
    }

    public function TokenAssignToUser(Request $request)
    {
        try {
            $user_id = $request->user_id;
            $serviceid = $request->id;
            $tokenQuantities = $request->tokens_purchased;

            // Validate input data
            if (!$user_id || empty($serviceid) || empty($tokenQuantities)) {
                return back()->with('error', 'Invalid data submitted. Please check and try again.');
            }

            if (count($serviceid) !== count($tokenQuantities)) {
                return back()->with('error', 'Mismatched data. Please ensure all fields are correctly filled.');
            }

            // Prepare order data
            $tokenQty = implode(',', $tokenQuantities);
            $serviceName = implode(',', $serviceid);

            $orderData = [
                'razorpay_order_id' => 'Token_assign_By_Admin',
                'user_id' => $user_id,
                'amount' => 0.00,
                'currency' => 'INR',
                'status' => 'paid',
                'service_id' => $serviceName,
                'tokens_purchased' => $tokenQty,
                'tokens' => $tokenQty,
            ];

            $createdOrder = Order::create($orderData);
            if (!$createdOrder || !$createdOrder->id) {
                return back()->with('error', 'Order creation failed.');
            }
            $tokens = [];
            $order_id = $createdOrder->id;
            $expiresAt = Carbon::now()->addDays(30);
            foreach ($tokenQuantities as $key => $value) {
                if ((int)$value > 0) {
                    for ($i = 0; $i < $value; $i++) {
                        $tokenData = new Token();
                    
                        $tokenData->user_id = $user_id;
                        $tokenData->order_id = $order_id;
                        $tokenData->service_id = $serviceNames[$key];
                        $tokenData->token = Str::random(32);
                        $tokenData->status = 'active';
                        $tokenData->api_status = 'active';
                        $tokenData->expires_at = $expiresAt;
                        $tokenData->save();
                        $tokens[] = $tokenData;
                    }
                }
            }
            // Send email after successful processing
            $user = User::find($user_id);
            Mail::to($user->email)->send(new TokenAssign($user, $tokens, $createdOrder));

            return redirect()->route('admin.user-list')->with('success', 'Tokens assigned and email sent successfully.');

        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    
    
}
