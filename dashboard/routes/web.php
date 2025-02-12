<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\BookSubmissionController;

// Halaman login
Route::get('/', function () {
    return view('login');
});

// Proses login untuk user
Route::post('/login', [LoginController::class, 'login']);

// Halaman login untuk admin
Route::get('/admin', [LoginController::class, 'adminPage']);

// Proses login untuk admin
Route::post('/admin/login', [LoginController::class, 'adminLogin']);

// Dashboard untuk user
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');

// Halaman Kritik dan Saran untuk user
Route::get('/user/kritik', function () {
    return view('user.kritik');
});

Route::get('/user/info', function () {
    return redirect()->away('http://127.0.0.1:5000/');
});

// Proses kritik dan saran
Route::post('/user/kritik/submit', [FeedbackController::class, 'submitKritik']);

// Halaman Pengajuan Buku untuk user
Route::get('/user/pengajuan', function () {
    return view('user.pengajuan');
});

// Proses pengajuan buku
Route::post('/user/pengajuan/submit', [BookSubmissionController::class, 'submitBook']);

// Admin Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Halaman Kritik dan Saran untuk admin
Route::get('/admin/kritik-saran', function () {
    $feedbacks = App\Models\Feedback::all(); // Ambil semua data kritik dan saran
    return view('admin.kritik-saran', compact('feedbacks'));
});

// Halaman Pengajuan Buku untuk admin
Route::get('/admin/pengajuan-buku', function () {
    $submissions = App\Models\BookSubmission::all(); // Ambil semua data pengajuan buku
    return view('admin.pengajuan-buku', compact('submissions'));
});
// Route untuk menghapus kritik dan saran
Route::delete('/admin/kritik-saran/{id}', [FeedbackController::class, 'destroy']);

Route::post('/admin/kritik-saran/{id}/selesai', [FeedbackController::class, 'markAsCompleted']);
Route::post('/admin/pengajuan-buku/{id}/selesai', [BookSubmissionController::class, 'markAsCompleted']);

// Route untuk menghapus pengajuan buku
Route::delete('/admin/pengajuan-buku/{id}', [BookSubmissionController::class, 'destroy']);

// Route to show marked feedback (kritik-saran)
Route::get('/admin/tandai/kritik-saran', [FeedbackController::class, 'showMarked'])->name('admin.tandai.kritik-saran');

// Route to show marked book submissions (pengajuan-buku)
Route::get('/admin/tandai/pengajuan-buku', [BookSubmissionController::class, 'showMarked'])->name('admin.tandai.pengajuan-buku');



