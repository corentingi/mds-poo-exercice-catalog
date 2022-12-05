<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'series';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The episodes that belong to the series.
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class, 'series_id');
    }

    /**
     * The list of seasons for this series.
     */
    public function seasons()
    {
        $seasons = array();
        foreach ($this->episodes as $episode) {
            $seasonNumber = $episode->seasonNumber ?: 'UNKNOWN';
            $episodeNumber = $episode->episodeNumber ?: $episode->id;

            if (!array_key_exists($seasonNumber, $seasons)) {
                $seasons[$seasonNumber] = new Collection();
            }
            $seasons[$seasonNumber][$episodeNumber] = $episode;
        }

        ksort($seasons);
        return $seasons;
    }

    /**
     * The genres that belong to the series.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'series_genres');
    }
}
