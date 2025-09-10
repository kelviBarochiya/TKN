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
                <h1> {{ $details['type'] }} Enquiry Mail</h1>
            </div>
            <div class="content">
                <div class="v-font-size" style="font-size: 14px; line-height: 140%; text-align: justify; word-wrap: break-word;">
                    <p style="font-size: 14px; line-height: 140%;">
                        <strong>Hello Admin</strong>,
                    </p>
                    {{-- <p ">
                        We are pleased to inform you that your project <strong>{{ $project->title }}</strong> has been approved.
                    </p>
                    <p style="font-size: 14px; line-height: 140%;">
                        Please feel free to contact us if you have any questions.
                    </p> --}}
                    <p style="font-size: 14px; line-height: 140%;">You have received a new enquiry for the
                        {{ $details['type'] }} titled <strong>{{ $details['title'] }}</strong>.</p>
                    <p style="font-size: 14px; line-height: 140%;"><strong>Name:</strong> {{ $details['name'] }}</p>
                    <p style="font-size: 14px; line-height: 140%;"><strong>Email:</strong> {{ $details['email'] }}</p>
                    <p style="font-size: 14px; line-height: 140%;"><strong>Phone:</strong> {{ $details['phone'] }}</p>
                    <p style="font-size: 14px; line-height: 140%;"><strong>City:</strong> {{ $details['city'] }}</p>
                    <p style="font-size: 14px; line-height: 140%;"><strong>Message:</strong> {{ $details['message'] }}
                    </p>
                    <p style="font-size: 14px; line-height: 140%;">If you have any questions or need further details,
                        please feel free to reach out.</p>
                </div>

                <p style="font-size: 14px; line-height: 140%;"><span style="color: #7eb1eb; font-size: 14px; line-height: 19.6px;"><strong>Thank you.</strong></span></p>
                <p style="font-size: 14px; line-height: 140%;"><span style="color: #7eb1eb; font-size: 14px; line-height: 19.6px;"><strong>&copy; {{ date('Y') }} Auricity. All rights reserved.</strong></span></p>
            </div>
        </div>
    </div>
</body>

</html>
