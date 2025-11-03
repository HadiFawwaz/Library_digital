<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a catalogue of available books.
     */
    public function index(Request $request): View
    {
        $search = $request->string('q')->trim();
        $category = $request->string('category')->trim();

        $books = Book::query()
            ->when($search->isNotEmpty(), function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('author', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($category->isNotEmpty(), fn ($query) => $query->where('category', $category))
            ->orderBy('title')
            ->paginate(10)
            ->withQueryString();

        $categories = Book::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('student.books.index', compact('books', 'categories', 'search', 'category'));
    }

    public function comment(Request $request, Book $book)
{
    $request->validate([
        'comment' => 'required|string|max:1000',
    ]);

    $book->comments()->create([
        'user_id' => auth()->id(),
        'content' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
}

    /**
     * Display a single book detail with borrow form.
     */
    public function show(Book $book): View
    {
            $book->load('comments.user'); // Load komentar beserta user
             return view('student.books.show', compact('book'));
    }
}
