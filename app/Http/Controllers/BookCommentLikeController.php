<?php

namespace App\Http\Controllers;
use App\Models\BookComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookCommentLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


     public function toggle(BookComment $comment)
    {
        $user = Auth::user();

        if ($comment->isLikedBy($user)) {
            $comment->likes()->where('user_id', $user->id)->delete();
        } else {
            $comment->likes()->create(['user_id' => $user->id]);
        }

        return back(); // atau response JSON kalau mau ajax
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
