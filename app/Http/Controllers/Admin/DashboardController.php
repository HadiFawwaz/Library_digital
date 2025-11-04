<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrowing;
use App\Models\BookComment;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Data lama: peminjaman terbaru
        $recentBorrowings = Borrowing::with('book', 'user')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        // Tambahin data komentar terbaru
        $recentComments = BookComment::with(['user', 'book', 'likes'])
            ->withCount('likes')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('recentBorrowings', 'recentComments'));
    }
    
    public function index()
    {
        return $this->__invoke();
    }
}
