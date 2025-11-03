<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCommentLike extends Model
{
    protected $fillable = ['user_id', 'book_comment_id'];

    public function comment()
    {
        return $this->belongsTo(BookComment::class);
        }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

