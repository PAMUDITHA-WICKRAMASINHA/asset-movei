<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'categories';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movies_categories')->withTimestamps();;
    }
}