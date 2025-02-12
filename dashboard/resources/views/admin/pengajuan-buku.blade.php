<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Buku</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
        }

        /* Custom button styles */
        .btn-custom {
            padding: 12px 20px;
            font-size: 14px;
        }

        .btn-info-custom {
            background-color: #17a2b8;
            color: white;
        }

        .btn-info-custom:hover {
            background-color: #138496;
        }

        .btn-warning-custom {
            background-color: #ffc107;
            color: white;
        }

        .btn-warning-custom:hover {
            background-color: #e0a800;
        }

        .btn-success-custom {
            background-color: #28a745;
            color: white;
        }

        .btn-success-custom:hover {
            background-color: #218838;
        }

        .btn-danger-custom {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger-custom:hover {
            background-color: #c82333;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-footer {
            background-color: #f1f1f1;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table td {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Pengajuan Buku</h2>

    <!-- Tabel untuk menampilkan data pengajuan buku -->
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Alasan Pengajuan</th>
                <th>Tanggal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions->sortBy('status') as $submission)
                <tr class="{{ $submission->status == 'selesai' ? 'table-success' : '' }}">
                    <td>{{ $submission->name }}</td>
                    <td>{{ $submission->book_title }}</td>
                    <td>{{ $submission->author }}</td>
                    <td>{{ \Str::limit($submission->reason, 50) }}</td> <!-- Batasi panjang alasan -->
                    <td>{{ optional($submission->created_at)->format('d-m-Y') ?? 'N/A' }}</td> <!-- Tampilkan tanggal -->
                    <td>
                        <!-- Button untuk membuka modal -->
                        <button class="btn btn-info btn-info-custom" data-bs-toggle="modal" data-bs-target="#submissionModal{{ $submission->id }}">
                            Read More
                        </button>
                    </td>
                </tr>

                <!-- Modal untuk menampilkan data lengkap -->
                <div class="modal fade" id="submissionModal{{ $submission->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <strong>Nama:</strong> {{ $submission->name }}<br>
                                <strong>Judul Buku:</strong> {{ $submission->book_title }}<br>
                                <strong>Pengarang:</strong> {{ $submission->author }}<br>
                                <strong>Alasan Pengajuan:</strong> {{ $submission->reason }}<br>
                                <strong>Tanggal:</strong> {{ optional($submission->created_at)->format('d-m-Y') ?? 'N/A' }}<br>
                            </div>
                            <div class="modal-footer">
                                <!-- Tombol Kembali -->
                                <button type="button" class="btn btn-secondary btn-custom" data-bs-dismiss="modal">Kembali</button>

                                <!-- Tombol Tandai -->
                                <form action="/admin/pengajuan-buku/{{ $submission->id }}/tandai" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-warning-custom btn-custom">Tandai</button>
                                </form>

                                <!-- Tombol Selesai -->
                                <form action="/admin/pengajuan-buku/{{ $submission->id }}/selesai" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-success-custom btn-custom">Selesai</button>
                                </form>

                                <!-- Tombol Hapus -->
                                <form action="/admin/pengajuan-buku/{{ $submission->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-danger-custom btn-custom">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Button Kembali ke Dashboard -->
    <a href="/admin/dashboard" class="btn btn-primary btn-custom">Kembali ke Dashboard</a>
</div>

<!-- Include Bootstrap JS for modal functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
