@extends('layouts.layout1')

@section('title', 'About')

@section('content')
  <h1 class="text-2xl font-bold">About page</h1>
  <h1> My name is {{ $list }}</h1>
  <h1>My skills is <ol>
    @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach</ol></h1>
        
        @foreach($students as $s)
  <p>{{ $s->name }} - {{ $s->class }} - {{ $s->age }}</p>
@endforeach

@endsection
