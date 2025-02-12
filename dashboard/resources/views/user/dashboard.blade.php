<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
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

        .dashboard-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
        }

        form {
            margin: 15px 0;
        }

        button {
            background-color:rgb(77, 166, 199);
            color: white;
            border: none;
            padding: 15px 25px;
            font-size: 20px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(79, 105, 114);
        }

        .divider {
            margin: 20px 0;
            border-top: 1px solid #ddd;
        }

        .text {
            font-size: 14px;
            color: #777;
        }

    </style>
</head>
<body>

    <div class="dashboard-container">
        <h2>Welcome User</h2>
        <p>Welcome to your dashboard!</p>

        <!-- Button 1: Info -->
        <form action="/user/info" method="GET">
            <button type="submit">Info</button>
        </form>

        <!-- Button 2: Kritik dan Saran -->
        <form action="/user/kritik" method="GET">
            <button type="submit">Kritik dan Saran</button>
        </form>

        <!-- Button 3: Pengajuan Buku -->
        <form action="/user/pengajuan" method="GET">
            <button type="submit">Pengajuan Buku</button>
        </form>

        <!-- Button 4: Search Book (Direct Link) -->
        <a href="http://pustaka.riau.go.id/inlislite/" target="_blank">
            <button type="button">Search Book</button>
        </a>

    </div>

</body>
</html>
