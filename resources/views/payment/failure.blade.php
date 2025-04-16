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

    /* Failure Page Styles */
    .failure-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .failure-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .failure-header {
        background: linear-gradient(to right, #e74c3c, #c0392b);
        color: white;
        padding: 30px;
        text-align: center;
        position: relative;
    }

    .failure-icon {
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

    .failure-icon svg {
        width: 40px;
        height: 40px;
        color: #e74c3c;
    }

    .failure-title {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .failure-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .failure-content {
        padding: 30px;
    }

    .transaction-details {
        margin-bottom: 30px;
    }

    .transaction-details-title {
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

    .error-info {
        background-color: #fff5f5;
        border-left: 4px solid #e74c3c;
        border-radius: 4px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .error-title {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .error-title svg {
        width: 20px;
        height: 20px;
        color: #e74c3c;
        margin-right: 10px;
    }

    .error-message {
        color: #666;
        margin-bottom: 15px;
    }

    .possible-reasons {
        margin-bottom: 30px;
    }

    .reasons-title {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 15px;
    }

    .reasons-list {
        list-style: none;
    }

    .reason-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .reason-icon {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
        color: #e74c3c;
    }

    .reason-text {
        color: #555;
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

    .contact-support {
        text-align: center;
        margin-top: 20px;
        color: #666;
    }

    .contact-support a {
        color: #f5a15d;
        text-decoration: none;
        font-weight: 500;
    }

    .contact-support a:hover {
        text-decoration: underline;
    }

    /* Responsive Styles */
    @media (min-width: 768px) {
        .action-buttons {
            flex-direction: row;
        }
    }

    @media (max-width: 575px) {
        .failure-title {
            font-size: 1.6rem;
        }
        
        .failure-subtitle {
            font-size: 1rem;
        }
        
        .failure-icon {
            width: 60px;
            height: 60px;
        }
        
        .failure-icon svg {
            width: 30px;
            height: 30px;
        }
    }
</style>
<main id="content">
    <div class="failure-container">
        <div class="failure-card">
            <div class="failure-header">
                <div class="failure-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                </div>
                <h1 class="failure-title">Payment Failed</h1>
                <p class="failure-subtitle">We were unable to process your payment</p>
            </div>
            
            <div class="failure-content">
                <div class="transaction-details">
                    {{-- <h2 class="transaction-details-title">Transaction Details</h2>
                    <div class="detail-row">
                        <span class="detail-label">Transaction ID</span>
                        <span class="detail-value">#TXN-458721</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Date</span>
                        <span class="detail-value">16 Apr 2025, 03:14 PM</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Status</span>
                        <span class="detail-value" style="color: #e74c3c;">Failed</span>
                    </div>
                </div> --}}
                
                <div class="error-info">
                    <h3 class="error-title">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        Error Information
                    </h3>
                    <p class="error-message">Your payment was declined by your bank or payment provider. No amount has been charged from your account.</p>
                </div>
                
                <div class="possible-reasons">
                    <h3 class="reasons-title">Possible Reasons</h3>
                    <ul class="reasons-list">
                        <li class="reason-item">
                            <div class="reason-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                            </div>
                            <div class="reason-text">Insufficient funds in your account</div>
                        </li>
                        <li class="reason-item">
                            <div class="reason-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                            </div>
                            <div class="reason-text">Card details entered incorrectly</div>
                        </li>
                        <li class="reason-item">
                            <div class="reason-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                            </div>
                            <div class="reason-text">Transaction flagged as suspicious by your bank</div>
                        </li>
                        <li class="reason-item">
                            <div class="reason-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                            </div>
                            <div class="reason-text">Temporary technical issue with the payment gateway</div>
                        </li>
                    </ul>
                </div>
                
                <div class="next-steps">
                    <h3 class="next-steps-title">What to Do Next</h3>
                    <ul class="steps-list">
                        <li class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-text">Verify your card details and ensure sufficient balance is available.</div>
                        </li>
                        <li class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-text">Try again with the same payment method or use a different payment option.</div>
                        </li>
                        <li class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-text">If the problem persists, contact your bank or our customer support for assistance.</div>
                        </li>
                    </ul>
                </div>
                
                <div class="action-buttons">
                    <a href="#" class="primary-btn">Try Payment Again</a>
                    <a href="#" class="secondary-btn">Change Payment Method</a>
                </div>
                
                <div class="contact-support">
                    Need help? <a href="#">Contact our support team</a>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection