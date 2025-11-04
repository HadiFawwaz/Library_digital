<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = BookComment::with(['user', 'book', 'likes'])->withCount('likes')->latest()->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(BookComment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}