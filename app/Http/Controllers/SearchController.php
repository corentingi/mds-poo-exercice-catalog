<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function search(Request $request) {
        $searchQuery = $request->query('q');
        if (strlen($searchQuery) < 3) {
            return 'ERROR';
        }

        $searchCondition = '%' . $searchQuery . '%';

        $results = new Collection();

        $results = $results->concat(Movie::where('primaryTitle', 'like', $searchCondition)->limit(20)->get());
        $results = $results->concat(Series::where('primaryTitle', 'like', $searchCondition)->limit(20)->get());
        $results = $results->concat(Episode::with('series')->where('primaryTitle', 'like', $searchCondition)->limit(20)->get());

        $sortedResults = $results->sortBy('primaryTitle');

        return view('search_results', [
            'searchQuery' => $searchQuery,
            'results' => $sortedResults->take(20),
        ]);
    }
}
