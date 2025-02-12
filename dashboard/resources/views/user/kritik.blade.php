<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kritik dan Saran</title>
    <style>
        /* Body and general page styling */
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

        /* Form container styling */
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 14px;
            margin-bottom: 30px;
            color: #777;
        }

        /* Label and input field styling */
        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        /* Submit button styling */
        button {
            background-color:rgb(77, 166, 199);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(79, 105, 114);
        }

        /* Link to go back to the dashboard */
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

    <!-- Form container -->
    <div class="form-container">
        <h2>Kritik dan Saran</h2>
        <p>Ajuan kritik dan saran Anda akan membantu kami meningkatkan kualitas layanan.</p>

        <!-- Kritik dan Saran Form -->
        <form action="/user/kritik/submit" method="POST">
            @csrf

            <div>
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="field">Bidang yang ingin diulas:</label>
                <input type="text" id="field" name="field" required>
            </div>

            <div>
                <label for="review">Ulasan:</label>
                <textarea id="review" name="review" rows="4" required></textarea>
            </div>

            <button type="submit">Kirim Kritik dan Saran</button>
        </form>

        <!-- Link to go back to the dashboard -->
        <a href="/user/dashboard" class="back-link">Kembali ke Dashboard</a>
    </div>

</body>
</html>
