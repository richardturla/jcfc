<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutes = Institute::all();

        return view('institute.index', compact('institutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('institute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:191',
        'initials' => 'nullable|string|max:191',
        'description' => 'nullable|string',
        'vmo' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
    ]);

    // Generate slug automatically from name
    $validated['slug'] = \Str::slug($validated['name']);

    // Handle file uploads
    if ($request->hasFile('logo')) {
        $validated['logo'] = $request->file('logo')->store('institutes/logos', 'public');
    }

    if ($request->hasFile('cover')) {
        $validated['cover_photo'] = $request->file('cover')->store('institutes/covers', 'public');
    }

    // Create institute record
    Institute::create($validated);

    return redirect()
        ->route('institute.index')
        ->with('success', 'Institute created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(Institute $institute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institute $institute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institute $institute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institute $institute)
    {
        //
    }
}
