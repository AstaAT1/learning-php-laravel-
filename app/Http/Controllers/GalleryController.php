<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
         public function index()
    {
        $galleries = gallery::latest()->get();
        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'photographer' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        gallery::create([
            'image' => $imagePath,
            'photographer' => $request->photographer,
            'type' => $request->type,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Photo added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gallery $gallery)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'photographer' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $gallery->image = $request->file('image')->store('gallery', 'public');
        }

        $gallery->photographer = $request->photographer;
        $gallery->type = $request->type;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Photo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Photo deleted successfully.');
    }
}
