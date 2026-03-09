@extends('layouts.layout1')

@section('title', 'Edit Photo')

@section('content')
<div class="min-h-[80vh] bg-zinc-950 px-4 py-10">
  <div class="max-w-2xl mx-auto">

    <div class="mb-8">
      <p class="text-amber-400 text-xs font-mono tracking-widest uppercase mb-2">— Edit</p>
      <h1 class="text-white text-4xl font-bold tracking-tight">Edit Photo</h1>
      <div class="mt-3 h-px w-48 bg-gradient-to-r from-amber-400 to-transparent"></div>
    </div>

    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl shadow-2xl p-6 md:p-8">
      <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Image --}}
        <div>
          <label class="block text-zinc-300 text-xs font-mono tracking-widest uppercase mb-2">Image</label>

          @if($gallery->image)
          <div class="mb-4">
            <p class="text-zinc-500 text-xs font-mono mb-2">Current Image:</p>
            <img src="{{ asset('storage/' . $gallery->image) }}" alt="Current Photo" class="h-32 w-auto rounded-xl object-cover border border-zinc-800">
          </div>
          @endif

          <div class="rounded-2xl border border-zinc-800 bg-zinc-950 p-4">
            <input
              type="file"
              name="image"
              accept="image/*"
              class="w-full text-zinc-200 file:mr-4 file:rounded-xl file:border-0 file:bg-amber-400 file:text-zinc-900 file:font-bold
                     hover:file:bg-amber-300 transition"
            >
            @error('image')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <p class="text-zinc-500 text-xs font-mono mt-3">
              PNG / JPG / WEBP — max 2MB (Leave empty to keep current image)
            </p>
          </div>
        </div>

        {{-- Photographer --}}
        <div>
          <label class="block text-zinc-300 text-xs font-mono tracking-widest uppercase mb-2">Photographer Name</label>
          <input
            type="text"
            name="photographer"
            placeholder="e.g. Asta"
            value="{{ old('photographer', $gallery->photographer) }}"
            class="w-full rounded-2xl border border-zinc-700 bg-zinc-950 text-zinc-200 px-4 py-3
                   placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-amber-400/30 focus:border-amber-400"
          >
          @error('photographer')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Type --}}
        <div>
          <label class="block text-zinc-300 text-xs font-mono tracking-widest uppercase mb-2">Type of Image</label>
          <select
            name="type"
            class="w-full rounded-2xl border border-zinc-700 bg-zinc-950 text-zinc-200 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-amber-400/30 focus:border-amber-400"
          >
            <option value="" disabled>Choose a type</option>
            <option value="Nature" {{ old('type', $gallery->type) == 'Nature' ? 'selected' : '' }}>Nature</option>
            <option value="Pets" {{ old('type', $gallery->type) == 'Pets' ? 'selected' : '' }}>Pets</option>
            <option value="Landscape" {{ old('type', $gallery->type) == 'Landscape' ? 'selected' : '' }}>Landscape</option>
            <option value="Portrait" {{ old('type', $gallery->type) == 'Portrait' ? 'selected' : '' }}>Portrait</option>
            <option value="Street" {{ old('type', $gallery->type) == 'Street' ? 'selected' : '' }}>Street</option>
            <option value="Travel" {{ old('type', $gallery->type) == 'Travel' ? 'selected' : '' }}>Travel</option>
            <option value="Food" {{ old('type', $gallery->type) == 'Food' ? 'selected' : '' }}>Food</option>
            <option value="Other" {{ old('type', $gallery->type) == 'Other' ? 'selected' : '' }}>Other</option>
          </select>
          @error('type')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex flex-col sm:flex-row gap-3 pt-2">
          <button type="submit"
            class="flex-1 bg-amber-400 hover:bg-amber-300 text-zinc-900 font-bold py-3 rounded-2xl
                   text-sm tracking-widest uppercase transition">
            Update
          </button>

          <a href="{{ route('gallery.index') }}"
            class="flex-1 text-center border border-zinc-700 hover:border-zinc-500 text-zinc-200 font-bold py-3 rounded-2xl
                   text-sm tracking-widest uppercase transition">
            Back to Gallery
          </a>
        </div>
      </form>
    </div>

  </div>
</div>
@endsection
