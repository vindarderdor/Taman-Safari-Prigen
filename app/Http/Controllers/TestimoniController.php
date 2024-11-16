<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Post::with('user')
            ->where('DELETE_MARK', 0)
            ->latest('CREATE_DATE')
            ->paginate(10);
        return view('testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'MESSAGE_TEXT' => 'required|string|max:1000'
        ]);

        Post::create([
            'SENDER' => auth()->id(),
            'MESSAGE_TEXT' => $validated['MESSAGE_TEXT'],
            'CREATE_BY' => auth()->id(),
            'DELETE_MARK' => 0
        ]);

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function update(Request $request, Post $testimonial)
    {
        $validated = $request->validate([
            'MESSAGE_TEXT' => 'required|string|max:1000'
        ]);

        $testimonial->update([
            'MESSAGE_TEXT' => $validated['MESSAGE_TEXT'],
            'UPDATE_BY' => auth()->id()
        ]);

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimoni berhasil diperbarui');
    }

    public function destroy(Post $testimonial)
    {
        $testimonial->update([
            'DELETE_MARK' => 1,
            'UPDATE_BY' => auth()->id()
        ]);

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimoni berhasil dihapus');
    }
}
