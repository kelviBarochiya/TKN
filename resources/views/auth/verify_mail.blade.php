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
            width: 100%;
            margin-top: 11%;
            
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
            background-color: #7eb1eb;
            color: #ffffff;
            border: none;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #6fa0d6;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            margin-top: 30px;
        }

        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease; 
        }
        .form-container input[type="email"]:focus {
            border-color: #7eb1eb; /* Blue border on focus */
            outline: none; /* Remove default outline */
        }

        .form-container button {
            display: inline-block;
            width: 100%;
            font-size: 16px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            background-color: #7eb1eb;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #6fa0d6;
        }
    </style>
</head>

<body>
    <div class="outer-container">
        <div class="container">
            <div class="header">
                <h1>Email Verification</h1>
            </div>
            <div class="content">
                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif

                @if(session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif

                <div class="form-container">
                    <form action="{{ route('verify.token') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <label for="email" style="font-size: 14px; line-height: 140%;">Enter your email:</label>
                        <input type="email" name="email" required>
                        <button type="submit">Verify Email</button>
                    </form>
                </div>
            </div>
            <div class="footer">
                <p style="font-size: 14px; line-height: 140%;"><span style="color: #7eb1eb; font-size: 14px; line-height: 19.6px;"><strong>Thank you.</strong></span></p>
                <p style="font-size: 14px; line-height: 140%;"><span style="color: #7eb1eb; font-size: 14px; line-height: 19.6px;"><strong>&copy; {{ date('Y') }} Auricity. All rights reserved.</strong></span></p>
            </div>
        </div>
    </div>
</body>

</html>
