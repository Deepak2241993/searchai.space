
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmation - SearchAI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 200px;
        }
        .content {
            color: #333333;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="logo">
            <img src="<?php echo e(url('/front-assets/images/footer_logo.png')); ?>" alt="SearchAI Logo">
        </div>
        <div class="content">
            <p>Dear <strong><?php echo e($user->name); ?></strong>,</p>
            <p>You have been assigned tokens by the<strong>SearchAI Team</strong>
                <br>Date of Assigning: <?php echo e(date('d-m-Y')); ?></h3>

            <h3>Next Steps:</h3>
            <p>You can now use your tokens to use the service. Simply follow these steps:</p>
            <ol>
                <li>Log in to your account at <a href="<?php echo e(url('/')); ?>"><?php echo e(url('/')); ?></a>.</li>
                <li>Enter the Aadhaar number or relevant details for verification.</li>
                <li>Submit the request.</li>
            </ol>
            <p>Once the verification is complete, you will receive a detailed report in PDF format via email.</p>
            <p>If you have any questions or need assistance, feel free to contact our support team at <a href="mailto:care@searchai.space">care@searchai.space</a>.</p>
            <p>Thank you for trusting us with your background verification needs.</p>
            <p>Best regards,</p>
            <p><strong>SearchAI Team</strong></p>
        </div>
        <div class="footer">
            &copy; <?php echo e(date('Y')); ?> SearchAI. All rights reserved.
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\searchai.space\resources\views/emails/token_assigned.blade.php ENDPATH**/ ?>