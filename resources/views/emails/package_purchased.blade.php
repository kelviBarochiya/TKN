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
            /* Gray background */
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            /* White background for the card */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #7eb1eb;
            /*Light blue background*/
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
            /* color: #ffffff; */
            /* background-color: #7eb1eb; */
            /* Light gray color for the button */
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
                <h1>Package Purchased</h1>
            </div>
            <div class="content">
                <div class="v-font-size"
                    style="font-size: 14px; line-height: 140%; text-align: justify; word-wrap: break-word;">
                    <p style="font-size: 14px; line-height: 140%;">
                        <strong>Hello</strong>,
                    </p>
                    <p style="font-size: 14px; line-height: 140%;">You have successfully purchased the package:
                        <strong>{{ $packageName }}</strong>.
                    </p>
                    <p style="font-size: 14px; line-height: 140%;">Thank you for choosing our service!</p>
                </div>

                {{-- <button href="#" class="button justify-center">Visit Our Website</button> --}}
                {{-- <a href="" target="_blank" class="v-button v-size-width v-font-size"
                    style="box-sizing: border-box;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #7eb1eb; border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px; width:30%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 14px;">
                    <span style="display:block;padding:10px 20px;line-height:120%;"><span
                            style="font-size: 14px; line-height: 16.8px;">Visit Our Website</span></span>
                </a> --}}
            </div>
            <div class="footer">
                <p style="font-size: 14px; line-height: 140%;"> If you have any questions, feel free to reply to
                    this email. We’re always here to help!</p>
            </div>
        </div>
    </div>
</body>

</html>
