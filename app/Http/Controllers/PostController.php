<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('DELETE_MARK', '0')->latest('CREATE_DATE')->get();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'MESSAGE_TEXT' => 'required|string|max:255',
                'MESSAGE_GAMBAR' => 'nullable|image|max:1024',
            ]);

            $post = new Post($validated);
            $post->SENDER = Auth::id();
            $post->CREATE_BY = Auth::user()->USERNAME;
            $post->CREATE_DATE = now();

            if ($request->hasFile('MESSAGE_GAMBAR')) {
                $path = $request->file('MESSAGE_GAMBAR')->store('posts', 'public');
                if ($path) {
                    $post->MESSAGE_GAMBAR = $path;
                } else {
                    Log::error('Failed to store image for post');
                }
            }

            $post->save();

            return redirect()->route('landing-page')->with('success', 'Post created successfully');
        } catch (\Exception $e) {
            Log::error('Error creating post: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error creating post. Please try again.');
        }
    }


    // Add update and delete methods here, remembering to set UPDATE_BY, UPDATE_DATE, and DELETE_MARK
}
