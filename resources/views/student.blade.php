@extends('layouts.layout1')

@section('title', 'Students')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-xl bg-white text-slate-900 border border-slate-200 rounded-2xl shadow-lg p-6 md:p-8">
        <div class="mb-6">
            <h2 class="text-2xl font-bold">Student Registration</h2>
            <p class="text-slate-600">Fill in the form below to submit your info.</p>
        </div>
        @if ($errors->any())
  <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-red-700">
    <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session('success'))
  <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-3 text-green-700">
    {{ session('success') }}
  </div>
@endif

        <form action="/students/store" method="Post" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">Student Name</label>
                <input type="text" name="name" placeholder="Enter your name"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400
                           focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
            </div>

            <!-- Email -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">Student Email</label>
                <input type="email" name="email" placeholder="Enter your email"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400
                           focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
            </div>

            <!-- Age + Phone -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold text-slate-800 mb-2">Student Age</label>
                    <input type="number" name="age" placeholder="Enter your age"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400
                               focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
                </div>

                <div>
                    <label class="block font-semibold text-slate-800 mb-2">Student Phone</label>
                    <input type="text" name="phone" placeholder="Enter your phone"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400
                               focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
                </div>
            </div>

            <!-- School (Checkbox: media / coding) -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">School</label>

                <div class="flex gap-3 flex-wrap">
                    <label class="cursor-pointer">
                        <input type="checkbox" name="school[]" value="media" class="peer sr-only">
                        <div class="px-4 py-2 rounded-xl border border-slate-300 bg-white
                                    peer-checked:border-green-500 peer-checked:bg-green-50
                                    hover:border-slate-400 transition">
                            Media
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="checkbox" name="school[]" value="coding" class="peer sr-only">
                        <div class="px-4 py-2 rounded-xl border border-slate-300 bg-white
                                    peer-checked:border-green-500 peer-checked:bg-green-50
                                    hover:border-slate-400 transition">
                            Coding
                        </div>
                    </label>
                </div>
            </div>

            <!-- Gender (Radio: female / male) -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">Student Gender</label>

                <div class="flex gap-3 flex-wrap">
                    <label class="cursor-pointer">
                        <input type="radio" name="gender" value="female" class="peer sr-only">
                        <div class="px-4 py-2 rounded-xl border border-slate-300 bg-white
                                    peer-checked:border-green-500 peer-checked:bg-green-50
                                    hover:border-slate-400 transition">
                            Female
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="gender" value="male" class="peer sr-only">
                        <div class="px-4 py-2 rounded-xl border border-slate-300 bg-white
                                    peer-checked:border-green-500 peer-checked:bg-green-50
                                    hover:border-slate-400 transition">
                            Male
                        </div>
                    </label>
                </div>
            </div>

            <!-- English Level (Range 0 - 100) -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="block font-semibold text-slate-800">English Level</label>
                    <span class="text-sm text-slate-600"><span id="englishValue">50</span>/100</span>
                </div>

                <input
                    type="range"
                    min="0"
                    max="100"
                    name="english"
                    value="50"
                    class="w-full accent-green-500"
                    oninput="document.getElementById('englishValue').innerText=this.value"
                >
            </div>

            <!-- Campus (Select) -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">Campus</label>
                <select name="campus"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900
                           focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500">
                    <option value="" selected disabled>Choose your campus</option>
                    <option value="casablanca">Casablanca</option>
                    <option value="mohammedia">Mohammedia</option>
                    <option value="rabat">Rabat</option>
                </select>
            </div>

            <!-- Terms (Radio yes=1 / no=0) -->
            <div>
                <label class="block font-semibold text-slate-800 mb-2">Terms</label>

                <div class="flex gap-3 flex-wrap">
                    <label class="cursor-pointer">
                        <input type="radio" name="terms" value="1" class="peer sr-only">
                        <div class="px-4 py-2 rounded-xl border border-slate-300 bg-white
                                    peer-checked:border-green-500 peer-checked:bg-green-50
                                    hover:border-slate-400 transition">
                            Yes
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="terms" value="0" class="peer sr-only">
                        <div class="px-4 py-2 rounded-xl border border-slate-300 bg-white
                                    peer-checked:border-green-500 peer-checked:bg-green-50
                                    hover:border-slate-400 transition">
                            No
                        </div>
                    </label>
                </div>
            </div>

            <button type="submit"
                class="w-full rounded-xl bg-green-500 text-white font-semibold py-3 hover:bg-green-600 transition">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
