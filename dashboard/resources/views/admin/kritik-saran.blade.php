<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kritik dan Saran</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-success {
            background-color: #d4edda !important; /* Warna hijau untuk yang selesai */
        }
        /* Custom styling for buttons */
        .btn-custom {
            font-size: 14px;
            padding: 12px 20px;
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

        .btn-danger-custom {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger-custom:hover {
            background-color: #c82333;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        /* Custom modal header */
        .modal-header {
            background-color: #007bff;
            color: white;
        }

        /* Modal footer styling */
        .modal-footer {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Kritik dan Saran</h2>

        <!-- Table to display marked feedback -->
        <table class="table table-bordered table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>Nama</th>
                    <th>Bidang</th>
                    <th>Ulasan</th>
                    <th>Tanggal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks->sortBy('status') as $feedback)
                <tr class="{{ $feedback->status == 'selesai' ? 'table-success' : '' }}">
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->field }}</td>
                    <td>{{ \Str::limit($feedback->review, 50) }}</td> <!-- Limit review length -->
                    <td>{{ optional($feedback->created_at)->format('d-m-Y') ?? 'N/A' }}</td> <!-- Display date -->
                    <td>
                        <!-- Button to open modal -->
                        <button class="btn btn-info btn-info-custom" data-bs-toggle="modal" data-bs-target="#feedbackModal{{ $feedback->id }}">
                            Read More
                        </button>
                    </td>
                </tr>

                <!-- Modal to display full feedback details -->
                <div class="modal fade" id="feedbackModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Kritik dan Saran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <strong>Nama:</strong> {{ $feedback->name }}<br>
                                <strong>Bidang:</strong> {{ $feedback->field }}<br>
                                <strong>Ulasan:</strong> {{ $feedback->review }}<br>
                                <strong>Tanggal:</strong> {{ optional($feedback->created_at)->format('d-m-Y') ?? 'N/A' }}<br>
                            </div>
                            <div class="modal-footer">
                                <!-- Back button -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>

                                <!-- Mark as done button -->
                                <form action="/admin/kritik-saran/{{ $feedback->id }}/selesai" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-custom">Selesai</button>
                                </form>

                                <!-- Mark button -->
                                <form action="/admin/kritik-saran/{{ $feedback->id }}/tandai" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-custom">Tandai</button>
                                </form>

                                <!-- Delete button -->
                                <form action="/admin/kritik-saran/{{ $feedback->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-custom">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>

        <!-- Back to Dashboard Button -->
        <a href="/admin/dashboard" class="btn btn-primary btn-custom">Kembali ke Dashboard</a>
    </div>

    <!-- Include Bootstrap JS for modal functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
