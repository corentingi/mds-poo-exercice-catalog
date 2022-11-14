<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function list(Request $request) {
        $order_by = $request->query('order_by');
        $order = $request->query('order', 'asc');

        $query = Movie::query();
        if ($order_by != null) {
            $query->orderBy($order_by, $order);
        }

        $movies_paginator = $query->paginate(20);

        return view('movies_list', ['movies_paginator' => $movies_paginator]);
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
