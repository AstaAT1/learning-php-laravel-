<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('gallery.index', compact('photos'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'photographer' => 'required|string|max:255',
            'type' => 'required|string|max:50',
        ]);

        $validated['image'] = $request->file('image')->store('gallery', 'public');

        Photo::create($validated);

        return redirect()->route('gallery.index')->with('success', 'Photo uploaded!');
    }

    public function destroy(Photo $photo)
    {
        // delete file
        Storage::disk('public')->delete($photo->image);

        // delete row
        $photo->delete();

        return back()->with('success', 'Photo deleted!');
    }
}
