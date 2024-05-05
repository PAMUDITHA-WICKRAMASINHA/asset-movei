<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movies_language')->withTimestamps();;
    }
}