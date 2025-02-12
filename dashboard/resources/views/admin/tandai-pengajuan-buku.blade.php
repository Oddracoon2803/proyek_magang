<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tandai Pengajuan Buku</title>
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

        .btn-custom {
            width: 100%;
            padding: 15px;
            font-size: 16px;
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

        .btn-info-custom {
            background-color: #17a2b8;
            color: white;
        }

        .btn-info-custom:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Pengajuan Buku yang Ditandai</h2>

    <!-- Tabel menampilkan data yang ditandai -->
    <table class="table table-bordered">
        <thead class="thead-dark">
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
            @if($markedSubmissions->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data yang ditandai</td>
                </tr>
            @else
                @foreach($markedSubmissions as $submission)
                    <tr>
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>

                                    <!-- Tombol Hapus -->
                                    <form action="/admin/pengajuan-buku/{{ $submission->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </tbody>
    </table>

    <a href="/admin/dashboard" class="btn btn-primary btn-custom">Kembali ke Dashboard</a>

</div>

<!-- Include Bootstrap JS for modal functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
