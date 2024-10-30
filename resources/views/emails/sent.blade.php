<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectText }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #0056b3;
            /* Darker shade for professionalism */
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content p {
            line-height: 1.6;
            color: #333;
        }

        .button {
            display: inline-block;
            background-color: #0056b3;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 14px;
        }

        .reply-button {
            display: inline-block;
            background-color: #e2e6ea;
            color: #333;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
        }

        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #777;
        }

        @media (max-width: 600px) {
            .container {
                width: 100%;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $subjectText }}</h1>
        </div>
        <div class="content">
            <p>{!! $messageText !!}</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Monday Club. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
