<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showMainImage($filename)
    {
        try {
            $path = storage_path('app/' . 'assets/img/' . $filename);

            if (!file_exists($path)) {
                abort(404);
            }
    
            $file = file_get_contents($path);
            $type = mime_content_type($path);
    
            return response($file, 200)->header('Content-Type', $type);
        } catch (Exception $e) {
            return response()->json(['message' => 'ImageController >> showMainImage >> Failed to get Images: ' . $e->getMessage()], 500);
        }
    }

    public function showMoviesImage($filename)
    {
        try {
            $path = storage_path('app/' . 'assets/img/movie_images/' . $filename);

            if (!file_exists($path)) {
                abort(404);
            }
    
            $file = file_get_contents($path);
            $type = mime_content_type($path);
    
            return response($file, 200)->header('Content-Type', $type);
        } catch (Exception $e) {
            return response()->json(['message' => 'ImageController >> showMoviesImage >> Failed to get Images: ' . $e->getMessage()], 500);
        }
    }

    public function showDirectorsImage($filename)
    {
        try {
            $path = storage_path('app/' . 'assets/img/director_images/' . $filename);

            if (!file_exists($path)) {
                abort(404);
            }
    
            $file = file_get_contents($path);
            $type = mime_content_type($path);
    
            return response($file, 200)->header('Content-Type', $type);
        } catch (Exception $e) {
            return response()->json(['message' => 'ImageController >> showDirectorsImage >> Failed to get Images: ' . $e->getMessage()], 500);
        }
    }

    public function showTopCastsImage($filename)
    {
        try {
            $path = storage_path('app/' . 'assets/img/top_cast_images/' . $filename);

            if (!file_exists($path)) {
                abort(404);
            }
    
            $file = file_get_contents($path);
            $type = mime_content_type($path);
    
            return response($file, 200)->header('Content-Type', $type);
        } catch (Exception $e) {
            return response()->json(['message' => 'ImageController >> showTopCastsImage >> Failed to get Images: ' . $e->getMessage()], 500);
        }
    }
}