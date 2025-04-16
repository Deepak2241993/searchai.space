<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerAddress;
use App\Models\Service;
use Illuminate\Support\Facades\Log;


class CartController extends Controller
{
    // Add to Cart
    public function add(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'tokens' => 'required|integer|min:1',
            'pricePerItem' => 'required|numeric',
            'service_id' => 'required|string',
        ]);

        // Retrieve the current cart from the session
        $cart = session()->get('cart', []);

        // Generate a unique ID for the new item
        $itemId = uniqid();

        // Check if the item already exists in the cart
        $itemExists = false;
        foreach ($cart as &$item) {
            if ($item['service_id'] === $validated['service_id']) {
                $service = Service::where('id', $item['service_id'])->first();
                $taxRate = $service->tax ?? 0;

                $item['tokens'] += $validated['tokens'];
                $item['subtotal'] = $item['tokens'] * $validated['pricePerItem'];

                $item['tax_pay'] = $item['subtotal'] * ($taxRate / 100);
                $item['total_price'] = $item['subtotal'] + $item['tax_pay'];

                $itemExists = true;
                break;
            }
        }

        // If the item does not exist, add it as a new entry
        if (!$itemExists) {
            $service = Service::where('id', $validated['service_id'])->first();
            $taxRate = $service->tax ?? 0;
            $subtotal = $validated['tokens'] * $validated['pricePerItem'];
            $taxPay = $subtotal * ($taxRate / 100);

            $cart[] = [
                'id' => $itemId,
                'service_id' => $validated['service_id'],
                'tokens' => $validated['tokens'],
                'pricePerItem' => $validated['pricePerItem'],
                'subtotal' => $subtotal,
                'taxRate' => $taxRate,
                'taxAmount' => $taxPay,
                'total_price' => $subtotal + $taxPay,
            ];
        }

        // Store the updated cart in the session
        session()->put('cart', $cart);

        // Return a success response for AJAX
        return response()->json(['success' => true, 'message' => 'Item added to cart.']);
    }





    // View Cart
    public function index()
    {

        $cart = session()->get('cart', []);
        $subtotal = 0;
        $tax = 0;
        $rate_of_tax = [];
        
        // Calculate subtotal and tax
        foreach ($cart as $item) {
            if (is_array($item)) {
                $subtotal += $item['pricePerItem'] * $item['tokens'];
        
                // Ensure tax key exists in the item array
                $services = Service::find($item['id']);
                $taxRate = $services['tax'] ?? 0; 
                $tax += ($item['pricePerItem'] * $item['tokens']) * ($taxRate / 100);
                
                // Store tax rate
                $rate_of_tax[] = $taxRate;
            }
        }
        // Calculate total
        $total = $subtotal + $tax;
        return view('frontend.cart', compact('cart', 'subtotal', 'total', 'tax'));

    }

    public function remove(Request $request, $itemId)
{
    $itemId = (int) $itemId; // Ensure integer type
    $cart = session()->get('cart', []);

    foreach ($cart as $key => $item) {
        if ((int) $item['id'] === $itemId) {
            unset($cart[$key]);
            session()->put('cart', array_values($cart));

            return response()->json(['success' => true, 'message' => 'Item removed from cart.']);
        }
    }

    return response()->json(['success' => false, 'message' => 'Item not found in cart.']);
}

    // Proceed to Checkout
    // public function checkout(Request $request)
    // {

    //     dd($request->all());
    //     $carts = session()->get('cart', []);

    //     if (empty($carts)) {
    //         return redirect()->route('front.cart')->with('error', 'Your cart is empty. Please add items to proceed.');
    //     }
    //     // dd($cart);
    //     if (Auth::check() == false) {
    //         if (!session()->has('url.intended')) {

    //             session(['url.intended' => url()->current()]);
    //         }
    //         return redirect()->route('login');
    //     }
    //     $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->first();
    //     // dd($customerAddress);
    //     session()->forget('url.intended');

    //     return view('frontend.checkout', compact('customerAddress', 'carts'));
    // }
    public function checkout(Request $request)
{
    // Retrieve and decode the cart data from the request
    $cartData = json_decode($request->input('cart'), true);
    $subtotal = $request->input('subtotal');
    $tax = $request->input('tax');
    $total = $request->input('total');

    // Ensure cart data is available and not empty
    if (empty($cartData)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty. Please add items to proceed.');
    }

    // Check if the user is authenticated
    if (!Auth::check()) {
        session(['url.intended' => url()->current()]);
        return redirect()->route('login');
    }

    // Retrieve the customer address for the authenticated user
    $customerAddress = CustomerAddress::where('user_id', Auth::id())->first();

    // Clear the intended URL session key
    session()->forget('url.intended');

    // Return the checkout view with necessary data
    return view('frontend.checkout', [
        'customerAddress' => $customerAddress,
        'subtotal' => $subtotal,
        'tax' => $tax,
        'total' => $total,
        'carts' => $cartData,
    ]);
}


    public function getTotalItems()
    {
        $cart = session()->get('cart', []);
        $totalItems = 0;

        foreach ($cart as $item) {
            if (is_array($item)) {
                $totalItems += $item['tokens'];
            }
        }

        return $totalItems;
    }
}
