<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <style>
        body{
            text-align: center;
            padding: 50px;

        }

    </style>
</head>
<body>
    <p>È stato inviato un messaggio.</p>
    <p>{{ $message }}</p>
</body>
</html>