<?php

namespace App\Http\Controllers;

use App\Models\TopCast;
use Illuminate\Http\Request;
use Validator;
use Exception;

class TopCastController extends Controller
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

            $top_cast = new TopCast();
            $top_cast->name = $request->input('name');

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('top_cast_images');
                $top_cast->image = $imagePath;
            }
            $top_cast->save();


            return response()->json(['message' => 'Top cast created successfully', 'top_cast' => $top_cast], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to create top cast: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TopCast $topCast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TopCast $topCast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TopCast $topCast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TopCast $topCast)
    {
        try {
            $topCast->delete();

            return response()->json(['message' => 'Top cast deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to delete top cast: ' . $e->getMessage()], 500);
        }
    }
}