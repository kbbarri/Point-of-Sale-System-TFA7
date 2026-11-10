<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - POS System</title>
</head>
<body>
    <h1>Point of Sale System</h1>

    <nav>
        <a href="{{ route('home') }}">Home</a> |
        <a href="{{ route('about') }}">About</a> |
        <a href="{{ route('customers') }}">Customer Accounts</a> |
        <a href="{{ route('users') }}">User Accounts</a>
    </nav>

    <hr>

    <h2>About Our POS System</h2>

    <p>
        This Point of Sale (POS) system is a web application
        developed using the Laravel framework.
    </p>

    <p>
        It demonstrates routing, controllers, Blade templates,
        and static PHP arrays for managing sample account data.
    </p>
</body>
</html>