<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'formats';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movies_formats')
                    ->withPivot('disk_space', 'sub_seeds', 'file')
                    ->withTimestamps();
    }
}