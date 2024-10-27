<!-- resources/views/auth/users.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
    <h1>Registered Users</h1>

    @if ($users->isEmpty())
        <p>No users found.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Verification Code</th>
                    <th>Is Verified</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->verification_code }}</td>
                        <td>{{ $user->is_verified ? 'Yes' : 'No' }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('register') }}">Register a new user</a>
    <a href="{{ route('login') }}">Login</a>
</body>
</html>
