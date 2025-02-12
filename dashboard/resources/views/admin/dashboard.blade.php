<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .btn-custom {
            width: 100%;
            padding: 15px;
            font-size: 16px;
        }
        .btn-warning-custom {
            background-color: #f0ad4e;
            border-color: #f0ad4e;
        }
        .btn-warning-custom:hover {
            background-color: #ec971f;
            border-color: #d58512;
        }
        .btn-primary-custom {
            background-color: #0275d8;
            border-color: #0275d8;
        }
        .btn-primary-custom:hover {
            background-color: #025aa5;
            border-color: #01447e;
        }
        .btn-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mt-5">Dashboard Admin</h2>

        <!-- Buttons to show marked data -->
        <div class="btn-container">
            <a href="/admin/tandai/kritik-saran" class="btn btn-warning btn-custom btn-warning-custom">Tandai Kritik dan Saran</a>
            <a href="/admin/tandai/pengajuan-buku" class="btn btn-warning btn-custom btn-warning-custom">Tandai Pengajuan Buku</a>
        </div>

        <!-- Other Dashboard Buttons -->
        <div class="btn-container">
            <a href="/admin/kritik-saran" class="btn btn-primary btn-custom btn-primary-custom">Kritik dan Saran</a>
            <a href="/admin/pengajuan-buku" class="btn btn-primary btn-custom btn-primary-custom">Pengajuan Buku</a>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
