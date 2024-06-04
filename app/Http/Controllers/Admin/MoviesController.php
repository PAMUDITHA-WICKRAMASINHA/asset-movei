<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.movies.moviesList');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> index >> Failed to get movie: ' . $e->getMessage()
            ], 500);
        }
    }

    public function get_all_movies(Request $request)
    {
        try {
            // Read the request parameters for DataTables
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search')['value'];
            $order = $request->input('order')[0] ?? null;
            
            // Total records
            $totalRecords = Movie::count();
            
            // Query for filtered records
            $moviesQuery = Movie::query();
            
            // Filter by search value
            if (!empty($searchValue)) {
                $moviesQuery->where(function ($query) use ($searchValue) {
                    $query->where('title', 'like', '%' . $searchValue . '%')
                        ->orWhere('download_count', 'like', '%' . $searchValue . '%')
                        ->orWhere('duration', 'like', '%' . $searchValue . '%')
                        ->orWhere('release_date', 'like', '%' . $searchValue . '%')
                        ->orWhere('rate', 'like', '%' . $searchValue . '%');
                });
            }

            $moviesQuery->with('categories', 'top_casts', 'directors', 'formats', 'languages');
            
            // Check if $order is not null before accessing its elements
            if ($order !== null) {
                $orderByColumnIndex = $order['column'] ?? null;
                $orderByDirection = $order['dir'] ?? 'asc';
                if ($orderByColumnIndex !== null) {
                    $orderByColumnName = $request->input('columns')[$orderByColumnIndex]['data'] ?? null;
                    if ($orderByColumnName !== null) {
                        $orderByColumnName = $columnMappings[$orderByColumnIndex] ?? 'id';
                        $moviesQuery->orderBy($orderByColumnName, $orderByDirection);
                    }
                }
            }

            
            // Get filtered and paginated records
            $filteredRecords = $moviesQuery->count();
            $movies = $moviesQuery->skip($start)->take($length)->get();

            foreach ($movies as $movie) {
                $movie->image = route('showMoviesImage', ['filename' => basename($movie->image)]);
            }
            
            return response()->json([
                'draw' => intval($draw),
                'recordsTotal' => intval($totalRecords),
                'recordsFiltered' => intval($filteredRecords),
                'data' => $movies,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> get_all_movies >> Failed to get movies: ' . $e->getMessage()
            ], 500);
        }
    }
    
}