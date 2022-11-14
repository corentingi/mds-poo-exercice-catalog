<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function list() {
        $movies_paginator = Movie::paginate(20);

        return view('movies_list', ['movies_paginator' => $movies_paginator]);
    }

    public function show($id) {
        $movie = Movie::where('id', $id)->first();

        return view('movies_show', ['movie' => $movie]);
    }
}
