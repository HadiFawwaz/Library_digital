<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookFeedback;

class BookFeedbackController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'feedback' => 'nullable|string|max:1000',
        ]);

        BookFeedback::create([
            'book_id' => $book->id,
            'liked' => true,
            'feedback' => $request->feedback,
        ]);

        return back()->with('success', 'Terima kasih! Feedback-mu sudah terkirim.');
    }
}
