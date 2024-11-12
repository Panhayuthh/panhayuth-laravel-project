<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "hello, there! This is the index method of the PostController.";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create form will be shown here...";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Data will be stored here...";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "This is the show method of the PostController. The ID is: $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Edit form will be shown here for ID: $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Data will be updated here for ID: $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Data will be deleted here for ID: $id";
    }

    public function test() {
        return view('posts.test', 
        [
        'id' => 1,
        'name' => 'John Doe',
        'program' => 'Computer Science',
        ]);
    }
}
