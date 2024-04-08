<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'movies';

    public function directors()
    {
        return $this->belongsToMany(Director::class, 'movies_directors');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'movies_categories');
    }

    public function top_casts()
    {
        return $this->belongsToMany(TopCast::class, 'movies_top_casts');
    }

}