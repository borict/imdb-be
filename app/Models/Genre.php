<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'genres',
        'movie_id'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
