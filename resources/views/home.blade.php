<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        .container {
            margin: auto;
            max-width: 1000px;
        }

        .wrapper {
            margin: auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        }

        .poster {
            object-fit: cover;
            width: 200px;
            height: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>

        <div>
            <h3>Movies</h3>

            <div>
                <a href="/movies">
                    Show all movies
                </a>,
                <a href="/movies?order_by=startYear&order=asc">
                    Newest movies
                </a>,
                <a href="/movies?order_by=averageRating&order=desc">
                    Best rated movies
                </a>,
                <a href="/movies/random">
                    Random movie
                </a>
            </div>

            <div class="wrapper">
                @foreach ($movies as $movie)
                <div>
                    <a href="/movies/{{ $movie->id }}">
                        <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}" class="poster">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div>
            <h3>Series</h3>

            <div>
                <a href="/series">
                    Show all series
                </a>,
                <a href="/series?order_by=startYear&order=asc">
                    Newest series
                </a>,
                <a href="/series?order_by=averageRating&order=desc">
                    Best rated series
                </a>,
                <a href="/series/random">
                    Random series
                </a>
            </div>

            <div class="wrapper">
                @foreach ($series as $series_item)
                <div>
                    <a href="/series/{{ $series_item->id }}">
                        <img src="{{ $series_item->poster }}" alt="{{ $series_item->primaryTitle }}" class="poster">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
