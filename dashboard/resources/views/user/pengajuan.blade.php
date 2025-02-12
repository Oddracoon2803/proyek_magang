<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Buku</title>
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

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-size: 14px;
            margin-top: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            background-color:rgb(77, 166, 199);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(79, 105, 114);
        }

        .back-link {
            display: block;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
            text-decoration: none;
        }

        .back-link:hover {
            color: #4CAF50;
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h2>Pengajuan Buku</h2>

        <!-- Book Submission Form -->
        <form action="/user/pengajuan/submit" method="POST">
            @csrf

            <div>
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="book_title">Judul Buku:</label>
                <input type="text" id="book_title" name="book_title" required>
            </div>

            <div>
                <label for="author">Pengarang:</label>
                <input type="text" id="author" name="author" required>
            </div>

            <div>
                <label for="reason">Alasan Pengajuan:</label>
                <textarea id="reason" name="reason" rows="4" required></textarea>
            </div>

            <button type="submit">Kirim Pengajuan Buku</button>
        </form>

        <a href="/user/dashboard" class="back-link">Kembali ke Dashboard</a>
    </div>
</body>
</html>
