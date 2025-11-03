<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookCommentController extends Controller
{
    // Menambahkan komentar baru
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:book_comments,id', // kalau reply
        ]);

        $book->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->comment,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    // Toggle like/unlike
    public function toggleLike(BookComment $comment)
{
    $user = auth()->user();

    // Cek kalau user udah like komentar ini
    $existing = $comment->likes()->where('user_id', $user->id)->first();

    if ($existing) {
        $existing->delete();
        $status = 'Unliked';
    } else {
        $comment->likes()->create([
            'user_id' => $user->id,
        ]);
        $status = 'Liked';
    }

    return redirect()->back()->with('status', $status);
}

}
