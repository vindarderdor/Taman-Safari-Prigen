<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'KOMENTAR_TEXT' => 'required|string|max:255',
        ]);

        $comment = new Comment($validated);
        $comment->POSTING_ID = $post->POSTING_ID;
        $comment->USER_ID = auth()->id();
        $comment->CREATE_BY = auth()->user()->USERNAME;
        $comment->CREATE_DATE = now();

        $comment->save();

        return back()->with('success', 'Comment added successfully.');
    }
}
