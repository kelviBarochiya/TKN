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
            padding: 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #777777;
        }

        .button {
            display: inline-block;
            font-size: 16px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="outer-container">
        <div class="container">
            <div class="header">
                <h1>Status Change Notification</h1>
            </div>
            <div class="content">
                <div style="font-size: 14px; line-height: 140%; text-align: justify; word-wrap: break-word;">
                    <p style="font-size: 14px; line-height: 140%;"><strong>Hello {{ $user->name }},</strong></p>
                    <p style="font-size: 14px; line-height: 140%;">Your account status has been changed to <strong>
                            @if ($user->status == 1)
                                Active
                            @elseif ($user->status == 0)
                                Inactive
                            @else
                                Unknown
                            @endif
                        </strong>.</p>
                    <p style="font-size: 14px; line-height: 140%;">If you have any questions or need further assistance,
                        feel free to reach out to us.</p>
                </div>

                <p style="font-size: 14px; line-height: 140%;"><strong>Thank you.</strong></p>
                <p style="font-size: 14px; line-height: 140%;"><strong>&copy; {{ date('Y') }} Auracity. All rights
                        reserved.</strong></p>
            </div>
        </div>
    </div>
</body>

</html>
