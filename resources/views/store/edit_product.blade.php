@extends('layouts.layout1')

@section('title', 'Edit Product')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4 py-10">
  <div class="w-full max-w-2xl bg-white text-slate-900 border border-slate-200 rounded-2xl shadow-lg p-6 md:p-8">

    <div class="mb-6">
      <h2 class="text-2xl font-bold">Edit Product</h2>
      <p class="text-slate-600">Update the product details.</p>
    </div>

    @if ($errors->any())
      <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
        <ul class="list-disc pl-5 space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('sal3a.update', $store->id) }}" method="POST" class="space-y-5" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div>
        <label class="block font-semibold mb-2">Product Name</label>
        <input type="text" name="name" value="{{ old('name', $store->name) }}"
          class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
      </div>



      <div>
        <label class="block font-semibold mb-2">Description</label>
        <textarea name="description" rows="5"
          class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">{{ old('description', $store->description) }}</textarea>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-2">Price</label>
          <input type="number" step="0.01" name="price" value="{{ old('price', $store->price) }}"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
        </div>

        <div>
          <label class="block font-semibold mb-2">Stock</label>
          <input type="number" name="stock" value="{{ old('stock', $store->stock) }}"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">Size</label>
        <div class="flex gap-3 flex-wrap">
          @foreach(['S','M','L'] as $sz)
            <label class="cursor-pointer">
              <input type="radio" name="size" value="{{ $sz }}" class="peer sr-only"
                {{ old('size', strtoupper($store->size)) === $sz ? 'checked' : '' }}>
              <div class="min-w-[56px] text-center px-4 py-2 rounded-xl border border-slate-300 bg-white font-semibold
                          peer-checked:border-green-500 peer-checked:bg-green-50 peer-checked:text-green-700">
                {{ $sz }}
              </div>
            </label>
          @endforeach
        </div>
      </div>

      <div class="flex gap-3">
        <a href="{{ route('show_product') }}" type="submit"
          class="flex-1 rounded-xl text-center bg-green-500 text-white font-semibold py-3 hover:bg-green-600 transition">
          Save Changes
        </a>

        <a href="{{ route('show_product') }}"
          class="flex-1 text-center rounded-xl border border-slate-300 font-semibold py-3 hover:bg-slate-50 transition">
          Cancel
        </a>
      </div>

    </form>
  </div>
</div>
@endsection
