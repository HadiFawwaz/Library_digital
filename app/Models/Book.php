<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    /**
     * Attributes that can be mass assigned.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'slug',
        'author',
        'category',
        'cover_image_path',
        'description',
        'novel_text', // ditambahin biar bisa nyimpen isi novel
    ];

    /**
     * Borrowing records linked to the book.
     */
    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }

    public function comments()
{
    return $this->hasMany(BookComment::class)->latest(); // supaya komentar terbaru muncul di atas
}

    /**
     * Users who liked this book.
     */
    public function likedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_book_likes', 'book_id', 'user_id');
    }

    /**
     * Use the slug column for route model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
