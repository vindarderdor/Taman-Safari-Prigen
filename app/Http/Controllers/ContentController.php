<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $tikets = Content::all();
        return view('content.tiket.index', compact('tikets'));
    }

    public function create()
    {
        return view('content.tiket.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'TITLE' => 'required|string|max:255',
            // 'TITLE2' => 'nullable|string|max:255',
            'DESCRIPSION' => 'nullable|string',
            'HARGA_ADULT' => 'nullable|numeric',
            'HARGA_CHILD' => 'nullable|numeric',
            'IMAGE' => 'nullable|string|max:255',
        ]);

        
        // if ($request->hasFile('IMAGE')) {
            //     $validated['IMAGE'] = $request->file('IMAGE')->store('images', 'public');
            // }
            
            $data = $request->all();
            // dd($data);
        Content::create($data);

        return redirect()->route('tikets.index')->with('success', 'Content created successfully!');
    }

    public function show(Content $content)
    {
        return view('content.tiket.show', compact('content'));
    }

    public function edit(Content $content)
    {
        $tiket = Content::all();
        return view('content.tiket.edit', compact('tiket'));
    }

    public function update(Request $request, Content $content)
    {
        $validated = $request->validate([
            'TITLE' => 'required|string|max:255',
            'TITLE2' => 'nullable|string|max:255',
            'DESCRIPSION' => 'nullable|string',
            'IMAGE' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('IMAGE')) {
            $validated['IMAGE'] = $request->file('IMAGE')->store('images', 'public');
        }

        $content->update($validated);

        return redirect()->route('tikets.index')->with('success', 'Content updated successfully!');
    }

    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('tikets.index')->with('success', 'Content deleted successfully!');
    }
}