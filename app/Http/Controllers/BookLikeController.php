<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookFeedback;
use Illuminate\Support\Facades\Auth;

class BookLikeController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $user = Auth::user();
        
        // Toggle like/unlike
        if ($user->likedBooks()->where('book_id', $book->id)->exists()) {
            // Unlike the book
            $user->likedBooks()->detach($book->id);
            
            // Also remove the feedback if it exists
            BookFeedback::where('book_id', $book->id)
                        ->where('user_id', $user->id)
                        ->delete();
            
            $message = 'Novel dihapus dari disukai.';
        } else {
            // Like the book
            $user->likedBooks()->attach($book->id);
            
            // Also create a feedback record if one doesn't already exist for this user-book combination
            // This maintains compatibility with the existing feedback system
            if (!BookFeedback::where('book_id', $book->id)->where('user_id', $user->id)->exists()) {
                BookFeedback::create([
                    'book_id' => $book->id,
                    'user_id' => $user->id,  // Add this field to track user
                    'liked' => true,
                    'feedback' => null,
                ]);
            }
            
            $message = 'Novel berhasil disukai!';
        }
        
        // Check if it's an AJAX request
        if ($request->ajax() || $request->wantsJson()) {
            $isLiked = $user->likedBooks()->where('book_id', $book->id)->exists();
            return response()->json(['liked' => $isLiked, 'message' => $message]);
        } else {
            // For non-AJAX requests, redirect back with a message
            return redirect()->back()->with('success', $message);
        }
    }
    
    public function likedBooks()
    {
        $user = Auth::user();
        $likedBooks = $user->likedBooks()->with('comments')->paginate(10); // You can customize the query as needed
        
        return view('user.liked-books', compact('likedBooks'));
    }
}
