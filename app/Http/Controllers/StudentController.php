<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:20',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required',
        'age' => 'required|integer|min:18|max:40',

        'school' => 'required|array|min:1',
        'school.*' => 'in:media,coding',

        'gender' => 'required|in:female,male',
        'english' => 'required|integer|between:0,100',
        'campus' => 'required|in:casablanca,mohammedia,rabat',
        'terms' => 'required|in:0,1',
    ]);

    if ((int) $validated['terms'] === 0) {
        return back()
            ->withErrors(['terms' => 'You must accept the terms to submit.'])
            ->withInput();
    }

    // terms = 1
    $validated['terms'] = 1;

    Student::create($validated);

    return back()->with('success', 'Student saved!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

