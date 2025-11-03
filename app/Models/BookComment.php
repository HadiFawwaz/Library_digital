<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookComment extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'user_id', 'content'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(BookCommentLike::class);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
    public function replies()
{
    return $this->hasMany(BookComment::class, 'parent_id');
}
    
}

