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
        return $this->belongsToMany(Director::class, 'movies_directors')->withTimestamps();;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'movies_categories')->withTimestamps();;
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'movies_language')->withTimestamps();;
    }

    public function top_casts()
    {
        return $this->belongsToMany(TopCast::class, 'movies_top_casts')->withTimestamps();;
    }

    public function formats()
    {
        return $this->belongsToMany(Format::class, 'movies_formats')
                    ->withPivot('disk_space', 'sub_seeds', 'file')
                    ->withTimestamps();
    }

}