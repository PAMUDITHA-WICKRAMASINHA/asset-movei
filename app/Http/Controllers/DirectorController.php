<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Validator;
use Exception;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $director = new Director();
            $director->name = $request->input('name');

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('director_images');
                $director->image = $imagePath;
            }
            $director->save();


            return response()->json(['message' => 'Director created successfully', 'director' => $director], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to create director: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        try {
            $director->delete();

            return response()->json(['message' => 'Director deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to delete director: ' . $e->getMessage()], 500);
        }
    }
}
