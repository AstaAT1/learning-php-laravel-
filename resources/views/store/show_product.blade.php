@extends('layouts.layout1')
@section('content')

<div class="min-h-screen bg-zinc-950 p-8">
  <div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
      <div>
        <p class="text-amber-400 text-xs font-mono tracking-widest uppercase mb-1">— Inventory</p>
        <h1 class="text-white text-4xl font-bold tracking-tight">Products</h1>
        <div class="mt-2 h-px w-48 bg-gradient-to-r from-amber-400 to-transparent"></div>
      </div>
      <a href="{{ route('create_product') }}"
        class="bg-amber-400 hover:bg-amber-300 text-zinc-900 font-bold py-2 px-5 rounded-xl text-sm tracking-widest uppercase transition">
        + New Product
      </a>
    </div>

    {{-- Table --}}
    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl overflow-hidden shadow-2xl">
      <table class="w-full">
        <thead>
          <tr class="border-b border-zinc-800">
            <th class="text-left text-zinc-500 text-xs font-mono tracking-widest uppercase px-6 py-4">#</th>
            <th class="text-left text-zinc-500 text-xs font-mono tracking-widest uppercase px-6 py-4">Name</th>
            <th class="text-left text-zinc-500 text-xs font-mono tracking-widest uppercase px-6 py-4">Description</th>
            <th class="text-left text-zinc-500 text-xs font-mono tracking-widest uppercase px-6 py-4">Price</th>
            <th class="text-left text-zinc-500 text-xs font-mono tracking-widest uppercase px-6 py-4">Stock</th>
            <th class="text-left text-zinc-500 text-xs font-mono tracking-widest uppercase px-6 py-4">Size</th>
            <th class="text-left text-zinc-500 text-xs font-mono tracking-widest uppercase px-6 py-4">Action1</th>
            <th class="text-left text-zinc-500 text-xs font-mono tracking-widest uppercase px-6 py-4">Action2</th>
          </tr>
        </thead>
        <tbody>
          @forelse($stores as $sal3a)
            <tr class="border-b border-zinc-800/50 hover:bg-zinc-800/40 transition">

              <td class="px-6 py-4 text-zinc-500 text-sm font-mono">{{ $sal3a->id }}</td>
              @if($sal3a->image)
  <img src="{{ asset('storage/'.$sal3a->image) }}" class="w-12 h-12 object-cover rounded-lg" />
@else
  <span class="text-zinc-500 text-xs">No image</span>
@endif

              <td class="px-6 py-4">
                <span class="text-white font-semibold">{{ $sal3a->name }}</span>
              </td>

              <td class="px-6 py-4">
                <span class="text-zinc-400 text-sm">{{ Str::limit($sal3a->description, 40) }}</span>
              </td>

              <td class="px-6 py-4">
                <span class="text-amber-400 font-bold font-mono">${{ number_format($sal3a->price, 2) }}</span>
              </td>

              <td class="px-6 py-4">
                <span class="{{ $sal3a->stock > 10 ? 'bg-green-950 text-green-400 border-green-800' : 'bg-red-950 text-red-400 border-red-800' }}
                  border text-xs font-mono px-3 py-1 rounded-full">
                  {{ $sal3a->stock }} qty
                </span>
              </td>

              <td class="px-6 py-4">
                <span class="bg-zinc-800 border border-zinc-700 text-zinc-300 text-xs font-bold px-3 py-1 rounded-lg tracking-widest">
                  {{ strtoupper($sal3a->size) }}
                </span>
              </td>

       <td class="px-6 py-4">
  <form action="{{ route('sal3a.destroy', $sal3a->id) }}" method="POST"
        onsubmit="return confirm('Delete {{ $sal3a->name }}?')">
    @csrf
    @method('DELETE')
    <button type="submit"
      class="bg-red-950 hover:bg-red-900 border border-red-800 text-red-400 text-xs font-mono px-4 py-2 rounded-lg transition tracking-widest uppercase">
      Delete
    </button>
  </form>
</td>
<td class="px-6 py-4">
  <a href="{{ route('sal3a.edit', $sal3a->id) }}"
     class="bg-green-950 hover:bg-green-900 border border-green-800 text-green-400 text-xs font-mono px-4 py-2 rounded-lg transition tracking-widest uppercase">
    Update
  </a>
</td>

            </tr>
          @empty
            <tr>
              <td colspan="7" class="px-6 py-16 text-center text-zinc-600 font-mono text-sm">
                No products yet —
                <a href="{{ route('create_product') }}" class="text-amber-400 hover:underline">create one</a>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- <p class="text-zinc-600 text-xs font-mono mt-4 text-right">
      Total: {{ $sal3as->count() }} products
    </p> --}}

  </div>
</div>

@endsection
