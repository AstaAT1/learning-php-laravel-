@extends('layouts.layout1')

@section('title', 'Gallery')

@section('content')
<div class="min-h-screen bg-zinc-950 p-6 md:p-10">
  <div class="max-w-6xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between gap-4">
      <div>
        <p class="text-amber-400 text-xs font-mono tracking-widest uppercase mb-2">— Gallery</p>
        <h1 class="text-white text-4xl font-bold tracking-tight">Photos</h1>
        <div class="mt-3 h-px w-48 bg-gradient-to-r from-amber-400 to-transparent"></div>
      </div>

      <a href="{{ route('gallery.create') }}"
        class="bg-amber-400 hover:bg-amber-300 text-zinc-900 font-bold py-2 px-5 rounded-2xl text-sm tracking-widest uppercase transition">
        + Upload
      </a>
    </div>


    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-4 md:p-5">
      <div class="flex flex-col md:flex-row gap-3 md:items-center md:justify-between">
        <div class="flex items-center gap-3">
          <span class="text-zinc-500 text-xs font-mono tracking-widest uppercase">Type</span>
          <select
            class="rounded-xl border border-zinc-800 bg-zinc-950 text-zinc-200 px-3 py-2 text-sm
                   focus:outline-none focus:ring-2 focus:ring-amber-400/30 focus:border-amber-400"
          >
            <option>All</option>
            <option>Nature</option>
            <option>Pets</option>
            <option>Landscape</option>
            <option>Portrait</option>
            <option>Street</option>
            <option>Travel</option>
            <option>Food</option>
            <option>Other</option>
          </select>
        </div>

        <div class="flex items-center gap-3">
          <span class="text-zinc-500 text-xs font-mono tracking-widest uppercase">Search</span>
          <input
            type="text"
            placeholder="photographer..."
            class="w-full md:w-64 rounded-xl border border-zinc-800 bg-zinc-950 text-zinc-200 px-3 py-2 text-sm
                   placeholder:text-zinc-600 focus:outline-none focus:ring-2 focus:ring-amber-400/30 focus:border-amber-400"
          >
        </div>
      </div>
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

      @forelse($galleries as $gallery)
      {{-- Card --}}
      <div class="rounded-2xl overflow-hidden border border-zinc-800 bg-zinc-900 shadow-2xl">
        <div class="aspect-[4/3] bg-zinc-950">
          <img
            src="{{ asset('storage/' . $gallery->image) }}"
            class="w-full h-full object-cover"
            alt="photo"
          >
        </div>

        <div class="p-4 space-y-3">
          <div class="flex items-center justify-between gap-3">
            <p class="text-white font-semibold truncate">{{ $gallery->photographer ?? 'Unknown' }}</p>
            <span class="text-amber-300 text-xs font-mono px-2 py-1 rounded-xl border border-amber-400/30 bg-amber-400/10">
              {{ collect(['Nature', 'Pets', 'Landscape', 'Portrait', 'Street', 'Travel', 'Food'])->contains($gallery->type) ? $gallery->type : 'Other' }}
            </span>
          </div>

          <div class="flex items-center justify-between">
            <p class="text-zinc-500 text-xs font-mono">#{{ $gallery->id }}</p>

            <div class="flex items-center gap-2">
              {{-- Edit button --}}
              <a href="{{ route('gallery.edit', $gallery->id) }}"
                class="bg-green-950 hover:bg-green-900 border border-green-800 text-green-300 text-xs font-mono px-3 py-2 rounded-xl transition tracking-widest uppercase inline-block">
                Edit
              </a>

              {{-- Delete button --}}
              <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Delete this photo?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="bg-red-950 hover:bg-red-900 border border-red-800 text-red-300 text-xs font-mono px-3 py-2 rounded-xl transition tracking-widest uppercase">
                  Delete
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>
      @empty
        <div class="col-span-full text-center py-10 text-zinc-500 font-mono text-sm">
          No photos uploaded yet.
        </div>
      @endforelse

    </div>
  </div>
</div>
@endsection
