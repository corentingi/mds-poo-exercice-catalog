<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Title
{
    use HasFactory;

    /**
     * Indicates if the type of the title to filter.
     *
     * @var bool
     */
    public $titleTypes = 'tvEpisode';
}
