<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\Models\Format;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formats = Format::all();
        return response()->json(['message' => 'Format get successfully', 'formats' => $formats], 200);
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
                'resolution' => 'required|string|max:255',
                'aspect_ratio' => 'nullable',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $format = new Format();
            $format->name = $request->input('name');
            $format->resolution = $request->input('resolution');
            $format->aspect_ratio = $request->input('aspect_ratio');

            $format->save();

            return response()->json(['message' => 'Format created successfully', 'format' => $format], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'FormatController >> store >> Failed to create format: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Format $format)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Format $format)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Format $format)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Format $format)
    {
        //
    }
}