<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for the login form */
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        button {
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            padding: 14px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049; /* Slightly darker green */
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <!-- Login form container -->
    <div class="login-container">
        <h2>Login sebagai Admin</h2>

        <!-- Login form -->
        <form action="/admin/login" method="POST">
            @csrf

            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <!-- Display error messages if any -->
        @if ($errors->any())
            <div class="error-message">{{ $errors->first() }}</div>
        @endif
    </div>

</body>
</html>
