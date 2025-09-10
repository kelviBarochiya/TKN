<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .outer-container {
            width: 95%;
            padding: 20px;
            background: #e0e0e0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #7eb1eb;
            color: #000000;
            padding: 10px 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="outer-container">
        <div class="container">
            <div class="header">
                <h1>Enquiry Mail</h1>
            </div>
            <div class="content">
                <p><strong>Hello Admin,</strong></p>
                <p>You have received a new enquiry:</p>

                <p><strong>Name:</strong> {{ $name }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Contact:</strong> {{ $mobile }}</p>
                <p><strong>Message:</strong> {{ $userMessage }}</p>

                <br>
                <p style="color: #7eb1eb;"><strong>Thank you.</strong></p>
                <p style="color: #7eb1eb;"><strong>&copy; {{ date('Y') }} Siyara CloudAI LLC. All rights reserved.</strong></p>
            </div>
        </div>
    </div>
</body>

</html>
