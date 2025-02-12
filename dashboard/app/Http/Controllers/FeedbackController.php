<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function showFeedbackForm()
    {
        $feedbacks = Feedback::all(); // Fetch all feedbacks from the database

        return view('user.kritik', compact('feedbacks')); // Pass the feedbacks to the view
    }

    // Handle the submission of feedback
    public function submitKritik(Request $request)
    {
        // Validate and save the feedback
        $request->validate([
            'name' => 'required|string',
            'field' => 'required|string',
            'review' => 'required|string',
        ]);

        Feedback::create([
            'name' => $request->name,
            'field' => $request->field,
            'review' => $request->review,
            'status' => 'pending', // Default status for new feedback
            'is_marked' => false,  // Set to false initially
        ]);

        return redirect('/user/kritik')->with('success', 'Kritik dan saran berhasil dikirim!');
    }
    // List all feedback for admin
    public function listFeedbacks()
    {
        $feedbacks = Feedback::all();
        return view('admin.kritik-saran', compact('feedbacks'));
    }

    // Delete a specific feedback
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->back()->with('success', 'Kritik dan Saran berhasil dihapus!');
    }

    // Mark feedback as 'selesai'
    public function markAsCompleted($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->status = 'selesai';
        $feedback->save();
        return redirect()->back()->with('success', 'Kritik dan Saran telah ditandai sebagai selesai!');
    }

    // Mark feedback as 'tandai'
    public function markAsTandai($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->is_marked = true;
        $feedback->save();
        return redirect()->back()->with('success', 'Kritik dan Saran berhasil ditandai!');
    }

    public function showMarked()
    {
        // Get all feedbacks that are marked
        $markedFeedbacks = Feedback::where('is_marked', true)->get();
        return view('admin.tandai-kritik-saran', compact('markedFeedbacks'));
    }
}
