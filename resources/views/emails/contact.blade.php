<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f9f9f9;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; padding: 30px; font-family: Arial, sans-serif; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="padding-bottom: 20px;">
                            <h2 style="color: #333;">New Contact Message</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="font-size: 16px; color: #555;">
                            <p><strong>Name:</strong> {{ $name }}</p>
                            <p><strong>Email:</strong> {{ $email }}</p>
                            <p><strong>Phone:</strong> {{ $phone }}</p>
                            <p><strong>Comments:</strong></p>
                            <p style="background-color: #f1f1f1; padding: 12px; border-radius: 4px;">{{ $comments }}</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding-top: 30px; font-size: 12px; color: #aaa;">
                            <p>This message was submitted via your website's contact form.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
