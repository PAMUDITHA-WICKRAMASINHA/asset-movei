<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopCast extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'top_casts';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movies_top_casts');
    }
}