<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genres';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The movies that belong to the genre.
     */
    public function titles()
    {
        return $this->belongsToMany(Title::class, 'titles_genres', null, 'title_id');
    }

    /**
     * The movies that belong to the genre.
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'titles_genres', null, 'title_id');
    }

    /**
     * The series that belong to the genre.
     */
    public function series()
    {
        return $this->belongsToMany(Series::class, 'titles_genres', null, 'title_id');
    }

    /**
     * The episodes that belong to the genre.
     */
    public function episodes()
    {
        return $this->belongsToMany(Episode::class, 'titles_genres', null, 'title_id');
    }
}
