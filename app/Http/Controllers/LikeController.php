<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Request $request, Post $post)
    {
        $like = $post->likes()->where('USER_ID', Auth::id())->first();

        if ($like) {
            $like->delete();
            $isLiked = false;
        } else {
            $post->likes()->create([
                'USER_ID' => Auth::id(),
                'CREATE_BY' => Auth::user()->USERNAME,
                'CREATE_DATE' => now(),
            ]);
            $isLiked = true;
        }

        return response()->json([
            'isLiked' => $isLiked,
            'likesCount' => $post->likes()->count(),
        ]);
    }
}
