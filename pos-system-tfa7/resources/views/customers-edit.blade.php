<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer - POS System</title>

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
        <h2>Edit Customer</h2>

        <form action="{{ route('customers.update', $customer->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <label>Full Name</label>
            <input
                type="text"
                name="full_name"
                value="{{ old('full_name', $customer->full_name) }}"
            >
            @error('full_name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email', $customer->email) }}"
            >
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Phone Number</label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone', $customer->phone) }}"
            >
            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Update Customer</button>
        </form>

        <a href="{{ route('customers') }}">Back to Customers</a>
    </div>

</body>
</html>