<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Code</title>
</head>
<body>
    <h1>Verify Your Phone Number</h1>
    <form action="{{ url('/verifyCode') }}" method="post">
        @csrf <!-- CSRF token for web routes -->
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="verification_code">Verification Code:</label>
        <input type="text" id="verification_code" name="verification_code" required>

        <button type="submit">Verify</button>
    </form>
    <a href="{{ route('login') }}">Already verified? Login here.</a>
</body>
</html>
