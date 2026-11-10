<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts - POS System</title>
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

    <h2>User Accounts</h2>

<a href="{{ route('users.create') }}"
   style="display: inline-block;
          background: #2563eb;
          color: white;
          padding: 10px 15px;
          text-decoration: none;
          border-radius: 5px;
          margin-bottom: 15px;">
    + Add New User
</a>

@if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>

<td>
    @if($user->avatar)
        <img
            src="{{ asset('storage/' . $user->avatar) }}"
            alt="Profile Picture"
            style="width: 50px;
                   height: 50px;
                   object-fit: cover;
                   border-radius: 50%;">
    @else
        <img
            src="{{ asset('images/default-avatar.svg') }}"
            alt="Default Avatar"
            style="width: 50px;
                   height: 50px;
                   object-fit: cover;
                   border-radius: 50%;">
    @endif
</td>


<td>
    <a href="{{ route('users.edit', $user->id) }}"
       style="background: #2563eb;
              color: white;
              padding: 7px 12px;
              text-decoration: none;
              border-radius: 5px;">
        Edit
    </a>
</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>