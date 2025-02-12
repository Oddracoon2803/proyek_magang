<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        button {
            background-color:rgb(77, 166, 199);
            color: white;
            border: none;
            padding: 17px 20px;
            text-align: center;
            font-size: 20px;
            cursor: pointer;
            width: 100%;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(79, 105, 114);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .divider {
            margin: 20px 0;
            border-top: 1px solid #ddd;
        }

        .text {
            font-size: 14px;
            color: #555;
        }


        .text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <button type="submit">User</button>
            </div>
        </form>
        
        <div class="divider"></div>

        <form action="/admin" method="GET">
            @csrf
            <div class="form-group">
                <button type="submit">Admin</button>
            </div>
        </form>
    </div>
</body>
</html>
