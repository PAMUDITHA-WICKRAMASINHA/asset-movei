<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'directors';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movies_directors');
    }
}