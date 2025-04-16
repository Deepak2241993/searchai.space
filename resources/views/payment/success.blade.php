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

    /* Success Page Styles */
    .success-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .success-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .success-header {
        background: linear-gradient(to right, #4caf50, #45a049);
        color: white;
        padding: 30px;
        text-align: center;
        position: relative;
    }

    .success-icon {
        width: 80px;
        height: 80px;
        background-color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }

    .success-icon svg {
        width: 40px;
        height: 40px;
        color: #4caf50;
    }

    .success-title {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .success-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .success-content {
        padding: 30px;
    }

    .order-details {
        margin-bottom: 30px;
    }

    .order-details-title {
        font-size: 1.4rem;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .detail-label {
        color: #666;
        font-weight: 500;
    }

    .detail-value {
        font-weight: 600;
        color: #333;
    }

    .order-summary {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .summary-title {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 15px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .summary-label {
        color: #666;
    }

    .summary-value {
        font-weight: 500;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    .total-label {
        font-weight: 600;
        color: #333;
    }

    .total-value {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }

    .next-steps {
        margin-bottom: 30px;
    }

    .next-steps-title {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 15px;
    }

    .steps-list {
        list-style: none;
    }

    .step-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .step-number {
        width: 25px;
        height: 25px;
        background-color: #f5a15d;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 15px;
        flex-shrink: 0;
        font-size: 0.9rem;
    }

    .step-text {
        color: #555;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .primary-btn {
        background-color: #f5a15d;
        color: white;
        border: none;
        padding: 15px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        display: block;
        width: 100%;
        text-align: center;
        text-decoration: none;
    }

    .primary-btn:hover {
        background-color: #e08e45;
    }

    .secondary-btn {
        background-color: transparent;
        color: #555;
        border: 1px solid #ddd;
        padding: 15px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
        display: block;
        width: 100%;
        text-align: center;
        text-decoration: none;
    }

    .secondary-btn:hover {
        background-color: #f5f5f5;
        border-color: #ccc;
    }

    /* Responsive Styles */
    @media (min-width: 768px) {
        .action-buttons {
            flex-direction: row;
        }
    }

    @media (max-width: 575px) {
        .success-title {
            font-size: 1.6rem;
        }
        
        .success-subtitle {
            font-size: 1rem;
        }
        
        .success-icon {
            width: 60px;
            height: 60px;
        }
        
        .success-icon svg {
            width: 30px;
            height: 30px;
        }
    }
</style>

<div class="success-container">
    <div class="success-card">
        <div class="success-header">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <h1 class="success-title">Payment Successful!</h1>
            <p class="success-subtitle">Your verification service has been successfully purchased</p>
        </div>
        
        <div class="success-content">
            <div class="order-details">
                <h2 class="order-details-title">Order Details</h2>
                <div class="detail-row">
                    <span class="detail-label">Order ID</span>
                    <span class="detail-value">#{{ $order_id }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Payment Transaction Id</span>
                    <span class="detail-value">#{{ $paymentId }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Transaction Amount</span>
                    <span class="detail-value">₹{{ $amount }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">{{ \Carbon\Carbon::createFromTimestamp($createdAt)->format('d M Y, h:i A') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value" style="color: #4caf50;">
                        {{ ucfirst($status === 'success' ? 'Completed' : $status) }}
                    </span>
                </div>
            </div>
                       
            
            <div class="next-steps">
                <h3 class="next-steps-title">Next Steps</h3>
                <ul class="steps-list">
                    <li class="step-item">
                        <div class="step-number">1</div>
                        <div class="step-text">Check your email for verification instructions and receipt.</div>
                    </li>
                    <li class="step-item">
                        <div class="step-number">2</div>
                        <div class="step-text">Follow the instructions to complete your Aadhar verification process.</div>
                    </li>
                    <li class="step-item">
                        <div class="step-number">3</div>
                        <div class="step-text">You will receive your verification report within 60 seconds after submission.</div>
                    </li>
                </ul>
            </div>
            
            <div class="action-buttons">
                
                <a href="{{ route('dashboard') }}" class="secondary-btn">Return to Dashboard</a>
            </div>
        </div>
    </div>
</div>



@endsection