<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - POS System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #00000015;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }

        button {
            background: #2563eb;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit User Account</h2>

        <form action="{{ route('users.update', $user->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label>Username</label>
            <input
                type="text"
                name="username"
                value="{{ old('username', $user->username) }}"
            >
            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Full Name</label>
            <input
                type="text"
                name="full_name"
                value="{{ old('full_name', $user->full_name) }}"
            >
            @error('full_name')
                <div class="error">{{ $message }}</div>
            @enderror

<label for="avatar">Profile Picture (Optional)</label>

@if($user->avatar)
    <div style="margin-top: 10px;">
        <img
            src="{{ asset('storage/' . $user->avatar) }}"
            alt="Current Profile Picture"
            style="width: 100px;
                   height: 100px;
                   object-fit: cover;
                   border-radius: 50%;">
    </div>
@endif

<input
    type="file"
    id="avatar"
    name="avatar"
    accept="image/*"
>

<p style="font-size: 12px; color: #666;">
    Maximum file size: 2MB.
    Leave empty to keep the current picture.
</p>

@error('avatar')
    <div class="error">{{ $message }}</div>
@enderror

            <button type="submit">Update User</button>
        </form>

        <a href="{{ route('users') }}">Back to User Accounts</a>
    </div>
</body>
</html>