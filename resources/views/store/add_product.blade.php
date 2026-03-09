@extends('layouts.layout1')

@section('title', 'Create Product')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-2xl bg-white text-slate-900 border border-slate-200 rounded-2xl shadow-lg p-6 md:p-8">

        <div class="mb-6">
            <h2 class="text-2xl font-bold">Create Product</h2>
            <p class="text-slate-600">Add a new product to your store.</p>
        </div>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success --}}
        @if (session('success'))
            <div class="mb-5 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <form action="/post/store" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter product name"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400
                           focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            {{-- image --}}
         <input type="file" name="image" accept="image/*">

            <!-- Description -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">Description</label>
                <textarea name="description" rows="5" placeholder="Enter product description"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400
                           focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Price + Stock -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold text-slate-800 mb-2">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="0.00"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400
                               focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
                    @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-slate-800 mb-2">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" placeholder="Enter stock quantity"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400
                               focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
                    @error('stock') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Size -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">Size</label>

                <div class="flex gap-3 flex-wrap">
                    @foreach (['S' , "M" ,'L'] as $val => $label)
                        <label class="cursor-pointer">
                            <input type="radio" name="size" value="{{ $label }}" class="peer sr-only"
                                   {{ old('size')  }}>
                            <div class="min-w-[56px] text-center px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-800 font-semibold
                                        peer-checked:border-green-500 peer-checked:bg-green-50 peer-checked:text-green-700
                                        hover:border-slate-400 transition">
                                {{ $label }}
                            </div>
                        </label>
                    @endforeach
                </div>

                @error('size') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                class="w-full rounded-xl bg-green-500 text-white font-semibold py-3 hover:bg-green-600 transition">
                Create Product
            </button>
        </form>
    </div>
</div>
@endsection
