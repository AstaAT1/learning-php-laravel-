<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @viteReactRefresh
  @vite(['resources/css/app.css', 'resources/js/app.tsx'])

  <title>@yield('title', 'My App')</title>
</head>
<body>
  <nav class="bg-red-900 flex gap-10 p-5 text-white">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('about') }}">About</a>
      <a href="{{ route('students') }}">Students</a>
           <a href="{{ route('create_product') }}">add product</a>
        <a href="{{ route('show_product') }}">store</a>
         <a href="{{ route('gallery.index') }}">gallery</a>
         <a href="{{ route('gallery.create') }}">gallery create</a>
  </nav>

  <main class="p-6">
    @yield('content')
  </main>
</body>
</html>
