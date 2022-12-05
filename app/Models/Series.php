<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Title
{
    use HasFactory;

    /**
     * Indicates if the type of the title to filter.
     *
     * @var bool
     */
    public $titleTypes = ['tvSeries', 'tvMiniSeries'];

    /**
     * The list of seasons for this series.
     */
    public function seasons()
    {
        $seasons = array();
        foreach ($this->episodes as $episode) {
            $seasonNumber = $episode->pivot->seasonNumber ?: 'UNKNOWN';
            $episodeNumber = $episode->pivot->episodeNumber ?: $episode->id;

            if (!array_key_exists($seasonNumber, $seasons)) {
                $seasons[$seasonNumber] = new Collection();
            }
            $seasons[$seasonNumber][$episodeNumber] = $episode;
        }

        ksort($seasons);
        return $seasons;
    }
}
