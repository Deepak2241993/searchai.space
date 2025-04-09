<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Background Screening Report</title>
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
            <img src="{{url('/front-assets/images/footer_logo.png')}}" alt="SearchAI Logo">
            <h1>Licence Verification </h1>
        </div>
        <div class="content">
            <p>Dear <strong>{{$result->name}}</strong>,</p>
            <p>Thank you for choosing <strong>SearchAI</strong>! We are pleased to inform you that your Licence Verification Report is complete, Please find the details and verification report attached below..</p>
            <div class="details">
                <p><strong>Name: {{$result->name}}</strong></p>
                <p><strong>Token ID:</strong> {{ $token->token }}</p>
                <p><strong>Verification Type:</strong> {{$service_type}}</p>

            <p>Your <strong>Driving Licence</strong> verification report is attached to this email for your reference.
                If you have any questions or need further support, feel free to reach out to us.
                </p>
                <p>Thank you for trusting us with your DL verification process. We look forward to assisting you again!</p>

          
        </div>
        <div class="footer">
            <p>Best regards,</p>
            <p><strong>SearchAI Support Team</strong></p>
            <p>Email: care@searchai.space | Website: <a href="https://searchai.space">searchai.space</a></p>
        </div>
    </div>
</body>
</html>
