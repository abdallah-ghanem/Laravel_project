<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="{{ url('/register') }}" method="post">
        @csrf <!-- CSRF token for web routes -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required> <!-- Added email field -->

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Register</button>
    </form>
    <a href="{{ route('login') }}">Already have an account? Login here.</a>
</body>
</html>
