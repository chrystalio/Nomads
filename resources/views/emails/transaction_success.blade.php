<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction Success</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 200px;
            height: auto;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .message {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .footer {
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{url('frontend/images/new_logo.png')}}" alt="Nomads">
    </div>
    <div class="greeting">Dear {{$user->name}},</div>

    <div class="message">
        <p>We are delighted to inform you that your payment for the {{$travel_package->title}} has been successfully processed.</p>
        <p>Your e-ticket is attached to this email. Please print it out or save it on your mobile device and present it at the check-in counter.</p>
    </div>

    <div class="cta">
        <p>For any questions or further assistance, please don't hesitate to contact us:</p>
        <p>Email: info@nomads.com</p>
        <p>Phone: +6287712412358</p>
        <p>
            <a href="https://yourcompany.com/contact" class="button">Contact Us</a>
        </p>
    </div>

    <div class="footer">
        <p>Best regards,</p>
        <p>Nomads</p>
    </div>
</div>
</body>
</html>
