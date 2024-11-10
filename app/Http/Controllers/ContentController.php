<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Content;

class ContentController extends Controller
{
    public function index()
    {
        $contents = content::all();
        return view('admin.contents.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.contents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'place' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('public/contents');
        $imageUrl = Storage::url($imagePath);

        content::create([
            'place' => $request->place,
            'title' => $request->title,
            'title2' => $request->title2,
            'description' => $request->description,
            'image' => $imageUrl
        ]);

        return redirect()->route('contents.index')->with('success', 'content created successfully');
    }

    public function edit(content $content)
    {
        return view('admin.contents.edit', compact('content'));
    }

    public function update(Request $request, content $content)
    {
        $request->validate([
            'place' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete(str_replace('/storage', 'public', $content->image));
            
            // Store new image
            $imagePath = $request->file('image')->store('public/contents');
            $data['image'] = Storage::url($imagePath);
        }

        $content->update($data);
        return redirect()->route('contents.index')->with('success', 'content updated successfully');
    }

    public function destroy(content $content)
    {
        Storage::delete(str_replace('/storage', 'public', $content->image));
        $content->delete();
        return redirect()->route('contents.index')->with('success', 'content deleted successfully');
    }

    public function landingPage()
    {
        $contents = content::all();
        return view('landing', compact('contents'));
    }
}
