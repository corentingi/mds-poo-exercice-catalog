<?php

namespace App\Models;

use App\Models\Scopes\TitleTypeScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'titles';

    /**
     * Indicates if the type of the title to filter.
     *
     * @var bool
     */
    protected $titleType = null;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new TitleTypeScope);
    }

    /**
     * The genres that belong to the movie.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'titles_genres', 'title_id');
    }

    /**
     * Return the genres as a list.
     */
    public function genreList()
    {
        return $this->genres->map(function ($genre) { return $genre->label; })->toArray();
    }

    /**
     * The series to which the episode belong.
     */
    public function series()
    {
        return $this->belongsToMany(Series::class, 'titles_episodes', 'episode_id', 'title_id')->withPivot('seasonNumber', 'episodeNumber');
    }

    /**
     * The episodes that belong to the series.
     */
    public function episodes()
    {
        return $this->belongsToMany(Episode::class, 'titles_episodes', 'title_id', 'episode_id')->withPivot('seasonNumber', 'episodeNumber');
    }
}
