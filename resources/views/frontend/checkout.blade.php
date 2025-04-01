@extends('layouts.master')

@section('style')
<style>
    #content {
        display: flex;

        margin: 0 auto;
        padding: 40px;
        background: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    /* Billing details section on left side */
    .billing-details {
        flex: 1;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-right: 30px;
    }

    .billing-details h2 {
        font-size: 1.8em;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .billing-details label {
        font-weight: bold;
        margin-bottom: 5px;
        display: inline-block;
        color: #555;
    }

    .billing-details input,
    .billing-details textarea {
        width: 100%;
        padding: 15px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1em;
        color: #333;
    }

    .billing-details textarea {
        height: 100px;
    }

    .billing-details button {
        background-color: #ED760D;
        color: white;
        font-size: 1.2em;
        padding: 15px 20px;
        border-radius: 8px;
        cursor: pointer;
        border: none;
        width: 100%;
        margin-top: 20px;
    }

    .billing-details button:hover {
        background-color: #FF7E5F;
    }

    /* Order Summary Section on right side */
    .order-summary {
        flex: 1;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .order-summary h3 {
        font-size: 1.6em;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .order-summary ul {
        list-style: none;
        padding: 0;
    }

    .order-summary ul li {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        font-size: 1.2em;
        border-bottom: 1px solid #eee;
    }

    .order-summary .total-cost {
        font-weight: bold;
        font-size: 1.4em;
        text-align: center;
        padding-top: 20px;
    }

    /* Payment Method Section */
    .payment-method {
        text-align: center;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .payment-method h4 {
        font-size: 1.6em;
        margin-bottom: 20px;
        color: #333;
    }

    .stripe-button {
        background-color: #6772e5;
        color: white;
        padding: 15px 30px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 1.2em;
        cursor: pointer;
        border: none;
        width: 100%;
    }

    .stripe-button:hover {
        background-color: #5362c6;
    }

    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        /* Two columns */
        gap: 20px;
        margin-top: 50px !important;
        margin: 0 auto;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }

    input,
    textarea {
        width: 100%;
        padding: 12px;
        margin-top: 5px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1em;
        color: #333;
    }

    textarea {
        height: 100px;
    }

    button {
        background-color: #ED760D;
        color: white;
        font-size: 1.2em;
        padding: 15px 20px;
        border-radius: 8px;
        cursor: pointer;
        border: none;
        grid-column: span 2;
        /* Makes button span across both columns */
        margin-top: 20px;
    }

    button:hover {
        background-color: #FF7E5F;
    }


    /* Responsiveness */
    @media (max-width: 768px) {
        #content {
            flex-direction: column;
        }

        .billing-details,
        .order-summary {
            margin-right: 0;
            margin-bottom: 20px;
        }
    }
</style>
<!-- CSS for Additional Styling -->
<style>
    .title-text {
        font-size: 1.5rem;
        font-weight: 600;
        color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }

    .border-bottom {
        border-bottom: 1px solid #e0e0e0;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .transition-all:hover {
        transform: scale(1.05);
    }

    .cart-items-list li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .cart-items-list li button {
        background-color: #dc3545;
        color: white;
    }

    .cart-items-list li button:hover {
        background-color: #c82333;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .font-weight-bold {
        font-weight: 700;
    }
</style>
@endsection
@section('body')
<main id="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-sm-12">
                <div class="row">
                    @auth
                    @if (Auth::user()->is_admin == '')
                    <div
                        class="row mt-4 mb-5 justify-content-lg-between justify-content-md-center justify-content-sm-center">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="register-item d-flex align-items-center">
                                <p>Returning Customer? <a href="{{ route('login') }}">Click here to login</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="register-item d-flex align-items-center">
                                <p>Have a Coupon code? <a href="#!">Click here to enter your code</a></p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth

                    <form id="orderForm">
                        <!-- Billing Details Section -->
                        <div class="billing-details">
                            <h3>Billing Details</h3>

                            <!-- Name Field -->
                            <div class="form-group">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ auth()->check() ? auth()->user()->name : (isset($customerAddress) ? $customerAddress->name : '') }}"
                                    placeholder="Full Name" required>
                            </div>

                            <!-- Phone Field -->
                            <div class="form-group">
                                <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    class="form-control"
                                    value="{{ isset($customerAddress) ? $customerAddress->phone : old('phone') }}"
                                    placeholder="Phone Number"
                                    pattern="[0-9]+"
                                    required>
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email">Email Address<span class="text-danger">*</span></label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ auth()->check() ? auth()->user()->email : (isset($customerAddress) ? $customerAddress->email : old('email')) }}"
                                    placeholder="Email Address"
                                    readonly>
                            </div>


                            <!-- Address Field -->
                            <div class="form-group">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <textarea id="address" name="address" class="form-control"
                                    value="{{ isset($customerAddress) ? $customerAddress->address : '' }}"
                                    placeholder="e.g. House, Road, Street Name" required></textarea>
                            </div>                           
                            <hr>
                            <h4>Company Details</h4>
                            <hr>
                            <div class="form-group">
                                <label for="company_name">Company Name (Optional)</label>
                                <input type="text" id="company_name" name="company_name" class="form-control"
                                    value="{{ isset($customercompany_name) ? $customercompany_name->company_name : '' }}"
                                    placeholder="e.g. xyz.pvt.ltd">
                            </div>  
                            <div class="form-group">
                                <label for="gst_number">GST (Optional)</label>
                                <input type="text" id="gst_number" name="gst_number" class="form-control"
                                    value="{{ isset($customergst_number) ? $customergst_number->gst_number : '' }}"
                                    placeholder="e.g. 29GGGGG1314R9Z6">
                            </div>  
                           
                        </div>


                        <!-- Order Details Section -->
                        <div class="col-md-12 mb-4">
                            <div class="card shadow-lg border-light">
                                <div class="card-body">
                                    <h3 class="title-text mb-4 text-center text-primary">Your Order</h3>
                                    <div class="cart-items-list mb-4">
                                        <ul class="list-unstyled">
                                            @php
                                                $subtotal = 0;
                                                $totalTax = 0;
                                                $grandTotal = 0;
                                                $totalTokens = 0;
                                            @endphp
                                            {{-- {{dd($carts)}} --}}
                                            @foreach ($carts as $key => $item)
                                                @php
                                                    $itemTotal = $item['pricePerItem'] * $item['tokens'];
                                                    $taxAmount = $item['taxAmount'] ?? 0;
                                                    $itemTotalWithTax = $itemTotal + $taxAmount;
                                        
                                                    $subtotal += $itemTotal;
                                                    $totalTax += $taxAmount;
                                                    $grandTotal += $itemTotalWithTax;
                                                    $totalTokens += $item['tokens'];
                                                @endphp
                                        
                                                <li class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-3">
                                                    <div>
                                                        <h5 class="font-weight-bold">{{ $item['serviceName'] == 'KYC+CCRV' ? 'Aadhar KYC + Criminal Background Verification' : $item['serviceName'] }}</h5>
                                                        <input type="hidden" name="service_id[]" value="{{ $item['service_id'] }}">
                                                        <input type="hidden" name="tokens[]" value="{{ $item['tokens'] }}">
                                                        <span class="text-muted">&#8377;{{ number_format($item['pricePerItem'], 2) }} x {{ $item['tokens'] }} tokens</span>
                                                    </div>
                                                    <div>
                                                        <small>Tax: &#8377;{{ number_format($taxAmount, 2) }}</small><br>
                                                        <strong>Total: &#8377;{{ number_format($itemTotalWithTax, 2) }}</strong>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                
                                    <!-- Total Amount Section -->
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5 class="font-weight-bold">Subtotal</h5>
                                        <span class="text-right">&#8377;{{ number_format($subtotal, 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5 class="font-weight-bold">Tax</h5>
                                        <span class="text-right">&#8377;{{ number_format($totalTax, 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="font-weight-bold">Grand Total</h5>
                                        <span class="text-right">&#8377;{{ number_format($grandTotal, 2) }}</span>
                                    </div>
                                
                                    <div class="payment-information mb-4">
                                        <div class="form-check mb-3">
                                            <input id="credit-card" hidden type="radio" name="payment_method" value="stripe" class="form-check-input" checked>
                                            <input type="hidden" id="order-amount" name="amount" value="{{ $grandTotal }}">
                                            <input type="hidden" id="buy-tokens" name="buy-tokens" value="{{ $totalTokens }}">
                                        </div>
                                    </div>
                                
                                    <div class="text-center">
                                        <button type="submit" id="submitButton" class="btn btn-lg btn-primary w-100 btn-rounded shadow-lg transition-all">
                                            <i class="las la-check-circle"></i> <span id="buttonText">Place Order</span>
                                            <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


@section('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('orderForm').addEventListener('submit', async function(event) {
        event.preventDefault();

        const submitButton = document.getElementById('submitButton');
        const buttonText = document.getElementById('buttonText');
        const spinner = document.getElementById('spinner');

        // Disable button and show spinner
        submitButton.disabled = true;
        spinner.classList.remove('d-none');
        buttonText.textContent = 'Processing...';

        const amount = document.getElementById('order-amount').value;
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const address = document.getElementById('address').value;
        const company_name = document.getElementById('company_name').value;
        const gst_number = document.getElementById('gst_number').value;
        // Get all service names
        const service_id = Array.from(document.querySelectorAll('input[name="service_id[]"]')).map(input => input.value);

        // Get all token counts
        const tokens = Array.from(document.querySelectorAll('input[name="tokens[]"]')).map(input => input.value);
        const buyTokens = tokens.reduce((acc, curr) => acc + curr, 0); 
        
        if (!amount || !name || !email || !phone || !address || tokens.length === 0 || service_id.length === 0) {
            alert('Please fill all the required fields.');
            submitButton.disabled = false;
            spinner.classList.add('d-none');
            buttonText.textContent = 'Place Order';
            return;
        }


        console.log('User Details:', {
            amount,
            name,
            email,
            phone,
            address,
            company_name,
            gst_number
        });

        try {
            const response = await fetch("{{ route('payment.createOrder') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    amount,
                    name,
                    email,
                    phone,
                    address,
                    buyTokens,
                    service_id,
                    tokens,
                    company_name,
                    gst_number
                })
            });

            const data = await response.json();
            console.log('Order Creation Response:', data);

            if (data.orderId) {
                const options = {
                    key: "{{ config('services.razorpay.key') }}",
                    amount: data.amount * 100,
                    currency: "INR",
                    name,
                    description: "Order Payment",
                    order_id: data.orderId,
                    prefill: {
                        name,
                        email,
                        contact: phone
                    },
                    handler: async function(response) {
                        console.log('Razorpay Payment Response:', response);

                        const paymentResponse = await fetch("{{ route('payment.callback') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_signature: response.razorpay_signature
                            })
                        });

                        const paymentData = await paymentResponse.json();
                        console.log('Payment Callback Response:', paymentData);

                        if (paymentData.success) {
                            window.location.href = "{{ route('payment.success') }}";
                        } else {
                            alert('Payment verification failed. Please try again.');
                        }
                    },
                    modal: {
                        ondismiss: function() {
                            console.log('Payment popup closed by the user.');
                            alert('Payment was not completed. Please try again.');
                        }
                    },
                    theme: {
                        color: "#3399cc"
                    }
                };

                const rzp = new Razorpay(options);
                rzp.open();
            } else {
                alert('Failed to create order. Please try again.');
            }
        } catch (error) {
            console.error('Error creating order:', error);
            alert('An error occurred. Please try again.');
        }
    });
   
</script>
@endsection