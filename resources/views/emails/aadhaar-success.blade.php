<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Verification Report</title>
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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 200px;
        }
        .header h1 {
            color: #007bff;
            font-size: 24px;
            margin-top: 10px;
        }
        .content {
            color: #333333;
            line-height: 1.6;
        }
        .details p {
            margin: 8px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffff
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="{{url('/front-assets/assets/img/finallogo.png')}}" alt="SearchAI Logo">
            <h1>Verification Completed</h1>
        </div>
        <div class="content">
            <p>Dear <strong>{{ $customerName }}</strong>,</p>
            <p>Thank you for choosing <strong>SearchAI</strong>! We are pleased to inform you that your verification process is complete, and the detailed report is now available.</p>
            
            <div class="details">
                <p><strong>Name:</strong> {{ $customerName }}</p>
                <p><strong>Token ID:</strong> {{ $tokenId }}</p>
                <p><strong>Verification Type:</strong> {{ $service_type }}</p>
            </div>

            <p>Please find your <strong>Background Verification Report</strong> attached to this email.</p>

            <p>If you have any questions regarding the report or require further assistance, please do not hesitate to reach out to us.</p>

            <p><a href="mailto:care@searchai.space" class="btn">Contact Support</a></p>

            <p>Thank you for trusting us with your verification needs. We look forward to serving you again!</p>
        </div>
        <div class="footer">
            <p>Best regards,</p>
            <p><strong>SearchAI Support Team</strong></p>
            <p>Email: care@searchai.space | Website: <a href="https://searchai.space">searchai.space</a></p>
        </div>
    </div>
</body>
</html>
