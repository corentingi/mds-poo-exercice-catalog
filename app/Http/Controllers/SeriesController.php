<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Series;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function list(Request $request) {
        $order_by = $request->query('order_by');
        $order = $request->query('order', 'asc');
        $genre = $request->query('genre');

        $query = Series::query();
        if ($order_by != null) {
            $query->orderBy($order_by, $order);
        }

        if ($genre != null) {
            $query->whereHas('genres', function (Builder $q) use ($genre) {
                $q->where('label', $genre);
            });
        }

        $series_paginator = $query->paginate(20);
        $genres = Genre::all();

        return view('series_list', [
            'series_paginator' => $series_paginator,
            'genres' => $genres,
        ]);
    }

    public function show($id) {
        $series_item = Series::where('id', $id)->first();

        return view('series_show', ['series_item' => $series_item]);
    }

    public function random() {
        $series = Series::inRandomOrder()->first();
        $series_id = $series->id;
        return redirect('/series/' . $series_id);
    }
}
