<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tandai Kritik dan Saran</title>
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
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Kritik dan Saran yang Ditandai</h2>

    <!-- Tabel menampilkan data yang ditandai -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nama</th>
                <th>Bidang</th>
                <th>Ulasan</th>
                <th>Tanggal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($markedFeedbacks->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data yang ditandai</td>
                </tr>
            @else
                @foreach($markedFeedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->name }}</td>
                        <td>{{ $feedback->field }}</td>
                        <td>{{ \Str::limit($feedback->review, 50) }}</td> <!-- Batasi panjang ulasan -->
                        <td>{{ optional($feedback->created_at)->format('d-m-Y') ?? 'N/A' }}</td> <!-- Tampilkan tanggal -->
                        <td>
                            <!-- Button untuk membuka modal -->
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#feedbackModal{{ $feedback->id }}">
                                Read More
                            </button>
                        </td>
                    </tr>

                    <!-- Modal untuk menampilkan data lengkap -->
                    <div class="modal fade" id="feedbackModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="feedbackModalLabel{{ $feedback->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="feedbackModalLabel{{ $feedback->id }}">Detail Kritik dan Saran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <strong>Nama:</strong> {{ $feedback->name }}<br>
                                    <strong>Bidang:</strong> {{ $feedback->field }}<br>
                                    <strong>Ulasan:</strong> {{ $feedback->review }}<br>
                                    <strong>Tanggal:</strong> {{ optional($feedback->created_at)->format('d-m-Y') ?? 'N/A' }}<br>
                                </div>
                                <div class="modal-footer">
                                    <!-- Tombol Kembali -->
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>

                                    <!-- Tombol Hapus -->
                                    <form action="/admin/kritik-saran/{{ $feedback->id }}" method="POST" style="display:inline;">
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

    <!-- Kembali ke Dashboard Button -->
    <a href="/admin/dashboard" class="btn btn-primary btn-custom">Kembali ke Dashboard</a>

</div>

<!-- Include Bootstrap JS for modal functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
