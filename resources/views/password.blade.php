<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <p>Click the link below to reset your password:</p>
    <a href="{{ route('validasi-forgot-password', ['token' => $token]) }}">Reset Password</a>
    
</body>
</html>
