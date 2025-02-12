<?php

namespace App\Http\Controllers;

use App\Models\BookSubmission;
use Illuminate\Http\Request;

class BookSubmissionController extends Controller
{
    public function submitBook(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'book_title' => 'required|string',
            'author' => 'required|string',
            'reason' => 'required|string',
        ]);

        // Simpan data pengajuan buku ke dalam database
        $submission = new BookSubmission;
        $submission->name = $request->name;
        $submission->book_title = $request->book_title;
        $submission->author = $request->author;
        $submission->reason = $request->reason;
        $submission->save();

        // Kembalikan respons atau tampilkan pesan sukses
        return back()->with('success', 'Pengajuan buku berhasil dikirim!');
    }
    public function markAsCompleted($id)
    {
        // Cari data pengajuan buku berdasarkan ID
        $submission = BookSubmission::findOrFail($id);
        
        // Ubah status menjadi 'selesai'
        $submission->status = 'selesai';
        
        // Simpan perubahan ke database
        $submission->save();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pengajuan Buku telah ditandai sebagai selesai!');
    }
    public function destroy($id)
    {
        $submission = BookSubmission::findOrFail($id); // Cari data berdasarkan ID
        $submission->delete(); // Hapus data

        return redirect()->back()->with('success', 'Pengajuan Buku berhasil dihapus!');
    }
    public function markAsTandai($id)
    {
        $submission = BookSubmission::findOrFail($id);
        $submission->is_marked = true; // Tandai sebagai sudah ditandai
        $submission->save();

        return redirect()->back()->with('success', 'Pengajuan Buku berhasil ditandai!');
    }
    public function showMarked()
    {
        // Get all book submissions that are marked
        $markedSubmissions = BookSubmission::where('is_marked', true)->get();
        return view('admin.tandai-pengajuan-buku', compact('markedSubmissions'));
    }
    
}
