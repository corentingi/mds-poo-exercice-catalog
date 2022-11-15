<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function list(Request $request) {
        $order_by = $request->query('order_by');
        $order = $request->query('order', 'asc');
        $genre = $request->query('genre');

        $query = Movie::query();
        if ($order_by != null) {
            $query->orderBy($order_by, $order);
        }

        if ($genre != null) {
            $query->whereHas('genres', function (Builder $q) use ($genre) {
                $q->where('label', $genre);
            });
        }

        $movies_paginator = $query->paginate(20);
        $genres = Genre::all();

        return view('movies_list', [
            'movies_paginator' => $movies_paginator,
            'genres' => $genres,
        ]);
    }

    public function show($id) {
        $movie = Movie::where('id', $id)->first();

        return view('movies_show', ['movie' => $movie]);
    }

    public function random() {
        $movie = Movie::inRandomOrder()->first();
        $movie_id = $movie->id;
        return redirect('/movies/' . $movie_id);
    }
}
