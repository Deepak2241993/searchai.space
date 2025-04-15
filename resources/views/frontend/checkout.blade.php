@extends('layouts.master')

@section('page-title')
    Cart
@endsection
@section('page-description')
    Cart
@endsection 
@section('page-keywords')
    Cart
@endsection
@section('main-body')
<style>
    /* Reset and Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f5f5f7;
        color: #333;
        line-height: 1.6;
    }

    /* Page Title */
    .page-title-section {
        background: linear-gradient(to right, #4a4a4a, #7a7a7a);
        color: white;
        padding: 30px 0;
    }

    .page-title-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page-title {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .breadcrumbs {
        display: flex;
        align-items: center;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .breadcrumbs a {
        color: white;
        text-decoration: none;
    }

    .breadcrumbs a:hover {
        text-decoration: underline;
    }

    .breadcrumbs .separator {
        margin: 0 10px;
    }

    /* Main Content */
    .main-content {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .checkout-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
    }

    /* Form Styles */
    .form-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .card-header {
        padding: 20px;
        border-bottom: 1px solid #eee;
    }

    .card-title {
        font-size: 1.4rem;
        color: #333;
        display: flex;
        align-items: center;
    }

    .card-title-icon {
        width: 30px;
        height: 30px;
        background-color: #f5a15d;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-weight: bold;
    }

    .card-content {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .form-col {
        flex: 1;
        padding: 0 10px;
        min-width: 250px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }

    .text-danger {
        color: #dc3545;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #5AACCE;
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    .form-select {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 15px;
    }

    .form-check {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .form-check-input {
        margin-right: 10px;
        width: 18px;
        height: 18px;
    }

    .payment-methods {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
    }

    .payment-method {
        flex: 1;
        min-width: 120px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .payment-method:hover {
        border-color: #5AACCE;
    }

    .payment-method.selected {
        border-color: #5AACCE;
        background-color: rgba(90, 172, 206, 0.05);
    }

    .payment-method-icon {
        font-size: 24px;
        margin-bottom: 8px;
    }

    .payment-method-name {
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Order Summary */
    .order-summary-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .order-items {
        border-bottom: 1px solid #eee;
    }

    .order-item {
        display: flex;
        padding: 15px 20px;
        border-bottom: 1px solid #f5f5f5;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .item-image {
        width: 60px;
        height: 60px;
        border-radius: 5px;
        overflow: hidden;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-details {
        flex-grow: 1;
    }

    .item-name {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .item-plan {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 5px;
    }

    .item-quantity {
        font-size: 0.9rem;
        color: #666;
    }

    .item-price {
        font-weight: 600;
        margin-left: 15px;
        align-self: center;
    }

    .order-totals {
        padding: 20px;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .total-row:last-child {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    .total-label {
        color: #666;
    }

    .total-value {
        font-weight: 500;
    }

    .grand-total {
        font-size: 1.2rem;
        font-weight: 700;
        color: #333;
    }

    /* Buttons */
    .btn {
        display: inline-block;
        padding: 12px 25px;
        font-size: 1rem;
        font-weight: 600;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
        text-decoration: none;
    }

    .btn-primary {
        background-color: #f5a15d;
        color: white;
    }

    .btn-primary:hover {
        background-color: #e08e45;
    }

    .btn-outline {
        background-color: transparent;
        border: 1px solid #ddd;
        color: #666;
    }

    .btn-outline:hover {
        border-color: #5AACCE;
        color: #5AACCE;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    .actions {
        margin-top: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .secure-checkout {
        display: flex;
        align-items: center;
        margin-top: 20px;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 5px;
        border: 1px solid #eee;
    }

    .secure-icon {
        margin-right: 15px;
        font-size: 24px;
        color: #4caf50;
    }

    .secure-text {
        font-size: 0.9rem;
        color: #666;
    }

    .secure-text strong {
        color: #333;
    }

    hr {
        border: 0;
        border-top: 1px solid #eee;
        margin: 20px 0;
    }

    h3, h4 {
        margin-bottom: 15px;
        color: #333;
    }

    .text-center {
        text-align: center;
    }

    .w-100 {
        width: 100%;
    }

    .spinner-border {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 0.2em solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        animation: spinner-border .75s linear infinite;
    }

    .d-none {
        display: none;
    }

    @keyframes spinner-border {
        to { transform: rotate(360deg); }
    }

    .shadow-lg {
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .border-light {
        border: 1px solid #f1f1f1;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: 0.25rem;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .list-unstyled {
        list-style: none;
        padding-left: 0;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .align-items-center {
        align-items: center;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }

    .pb-3 {
        padding-bottom: 1rem;
    }

    .border-bottom {
        border-bottom: 1px solid #eee;
    }

    .font-weight-bold {
        font-weight: 700;
    }

    .text-muted {
        color: #6c757d;
    }

    .text-right {
        text-align: right;
    }

    .mb-2 {
        margin-bottom: 0.5rem;
    }

    .btn-lg {
        padding: 0.75rem 1rem;
        font-size: 1.25rem;
        line-height: 1.5;
    }

    .btn-rounded {
        border-radius: 50px;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    /* Responsive Styles */
    @media (min-width: 992px) {
        .checkout-container {
            grid-template-columns: 2fr 1fr;
        }
        
        .order-summary-card {
            position: sticky;
            top: 20px;
        }
    }

    @media (max-width: 767px) {
        .page-title {
            font-size: 1.6rem;
        }
        
        .form-row {
            flex-direction: column;
        }
        
        .form-col {
            margin-bottom: 15px;
        }
        
        .form-col:last-child {
            margin-bottom: 0;
        }
        
        .actions {
            flex-direction: column;
        }
        
        .actions .btn {
            width: 100%;
        }
    }

    @media (max-width: 575px) {
        .payment-methods {
            flex-direction: column;
        }
        
        .payment-method {
            width: 100%;
        }
        
        .order-item {
            flex-wrap: wrap;
        }
        
        .item-price {
            margin-left: 0;
            margin-top: 10px;
            width: 100%;
        }
    }
</style>
<section class="page-title-section">
    <div class="page-title-container">
        <h1 class="page-title">Checkout</h1>
        <div class="breadcrumbs">
            <a href="#">Home</a>
            <span class="separator">›</span>
            <a href="#">Services</a>
            <span class="separator">›</span>
            <span>Checkout</span>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="main-content">
    <form id="orderForm">
        <div class="checkout-container">
            <!-- Billing Information -->
            <div class="checkout-forms">
                <div class="form-card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <span class="card-title-icon">1</span>
                            Billing Information
                        </h2>
                    </div>
                    <div class="card-content">
                        <!-- Billing Details Section -->
                        <div class="billing-details">
                            <h3>Billing Details</h3>

                            <!-- Name Field -->
                            <div class="form-group">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control"
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
                                    value="user@example.com"
                                    placeholder="Email Address"
                                    readonly>
                            </div>

                            <!-- Address Field -->
                            <div class="form-group">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <textarea id="address" name="address" class="form-control"
                                    placeholder="e.g. House, Road, Street Name" required></textarea>
                            </div>                           
                            <hr>
                            <h4>Company Details</h4>
                            <hr>
                            <div class="form-group">
                                <label for="company_name">Company Name (Optional)</label>
                                <input type="text" id="company_name" name="company_name" class="form-control"
                                    placeholder="e.g. xyz.pvt.ltd">
                            </div>  
                            <div class="form-group">
                                <label for="gst_number">GST (Optional)</label>
                                <input type="text" id="gst_number" name="gst_number" class="form-control"
                                    placeholder="e.g. 29GGGGG1314R9Z6">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Method -->
                <div class="form-card" style="margin-top: 30px;">
                    <div class="card-header">
                        <h2 class="card-title">
                            <span class="card-title-icon">2</span>
                            Payment Method
                        </h2>
                    </div>
                    <div class="card-content">
                        <div class="payment-methods">
                            <div class="payment-method selected">
                                <div class="payment-method-icon">💳</div>
                                <div class="payment-method-name">Credit Card</div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-method-icon">🏦</div>
                                <div class="payment-method-name">Net Banking</div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-method-icon">📱</div>
                                <div class="payment-method-name">UPI</div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-method-icon">💸</div>
                                <div class="payment-method-name">Wallet</div>
                            </div>
                        </div>
                        
                        <div class="payment-details" style="margin-top: 20px;">
                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" required>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="expiryDate">Expiry Date</label>
                                        <input type="text" id="expiryDate" class="form-control" placeholder="MM/YY" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" class="form-control" placeholder="123" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="cardName">Name on Card</label>
                                <input type="text" id="cardName" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="secure-checkout">
                            <div class="secure-icon">🔒</div>
                            <div class="secure-text">
                                <strong>Secure Checkout:</strong> Your payment information is encrypted and secure. We do not store your credit card details.
                            </div>
                        </div>
                        
                        <input id="credit-card" hidden type="radio" name="payment_method" value="stripe" class="form-check-input" checked>
                        <input type="hidden" id="order-amount" name="amount" value="1178.82">
                        <input type="hidden" id="buy-tokens" name="buy-tokens" value="1">
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="actions">
                    <a href="#" class="btn btn-outline">← Return to Cart</a>
                    <button type="submit" id="submitButton" class="btn btn-primary">
                        <i class="las la-check-circle"></i> <span id="buttonText">Place Order</span>
                        <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="order-summary-card">
                <div class="card-header">
                    <h2 class="card-title">Order Summary</h2>
                </div>
                
                <div class="card-body">
                    <h3 class="title-text mb-4 text-center">Your Order</h3>
                    <div class="cart-items-list mb-4">
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-3">
                                <div>
                                    <h5 class="font-weight-bold">Aadhar Card Verification</h5>
                                    <input type="hidden" name="service_id[]" value="1">
                                    <input type="hidden" name="tokens[]" value="1">
                                    <span class="text-muted">₹999.00 x 1 tokens</span>
                                </div>
                                <div>
                                    <small>Tax: ₹179.82</small><br>
                                    <strong>Total: ₹1,178.82</strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                
                    <!-- Total Amount Section -->
                    <div class="d-flex justify-content-between mb-2">
                        <h5 class="font-weight-bold">Subtotal</h5>
                        <span class="text-right">₹999.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <h5 class="font-weight-bold">Tax</h5>
                        <span class="text-right">₹179.82</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="font-weight-bold">Grand Total</h5>
                        <span class="text-right">₹1,178.82</span>
                    </div>
                
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary w-100 btn-rounded shadow-lg transition-all">
                            <i class="las la-check-circle"></i> <span>Place Order</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<!-- JavaScript for Payment Method Selection -->



@endsection


@section('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    // Payment method selection
    const paymentMethods = document.querySelectorAll('.payment-method');
    
    paymentMethods.forEach(method => {
        method.addEventListener('click', function() {
            // Remove selected class from all methods
            paymentMethods.forEach(m => m.classList.remove('selected'));
            
            // Add selected class to clicked method
            this.classList.add('selected');
            
            // Here you would typically show/hide different payment form fields
            // based on the selected payment method
            const paymentMethodName = this.querySelector('.payment-method-name').textContent;
            const paymentDetails = document.querySelector('.payment-details');
            
            // Simple example - in a real application you'd have different forms for each method
            if (paymentMethodName === 'Credit Card') {
                paymentDetails.style.display = 'block';
            } else {
                paymentDetails.style.display = 'none';
            }
        });
    });
    
    // Form submission handling
    document.getElementById('orderForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show spinner and change button text
        const submitButton = document.getElementById('submitButton');
        const buttonText = document.getElementById('buttonText');
        const spinner = document.getElementById('spinner');
        
        buttonText.textContent = 'Processing...';
        spinner.classList.remove('d-none');
        submitButton.disabled = true;
        
        // Simulate form submission (in a real app, this would be an actual form submission)
        setTimeout(() => {
            alert('Order placed successfully!');
            window.location.href = 'order-confirmation.html';
        }, 2000);
    });
</script>
@endsection