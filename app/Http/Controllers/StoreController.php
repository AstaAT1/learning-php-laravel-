<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return view('store.show_product' , compact("stores"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('store.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'size' => 'required|in:S,M,L',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('products', 'public');
     
    }

    Store::create($validated);

    return redirect()->route('show_product')->with('success', 'Product created!');
}

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Store $store)
{
    return view('store.edit_product', compact('store'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Store $store)
{
    $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'required|string',
        'price'       => 'required|numeric|min:0',
        'stock'       => 'required|integer|min:0',
        'size'        => 'required|in:S,M,L',
    ]);

    $store->update($validated);

    return back()->with('success', 'Updated!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return back()->with('success', 'Product deleted!');
    }
}
