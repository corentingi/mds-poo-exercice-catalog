<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $series_item->originalTitle }}</title>

    <style>
        .container {
            width: 1000px;
            margin: auto;
        }

        th {
            font: bold;
            text-align: right;
            min-width: 4rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="padding-bottom: 1rem;">
            <button onclick="history.back()">Go Back</button>
        </div>

        <div>
            <img src="{{ $series_item->poster }}" alt="{{ $series_item->originalTitle }}">
        </div>

        <h2>Details</h2>
        <table>
            <tr>
                <th>Title</th>
                <td>{{ $series_item->primaryTitle }} ({{ $series_item->originalTitle }})</td>
            </tr>
            <tr>
                <th>Genres</th>
                <td>
                    @foreach ($series_item->genres as $genre)
                    <a href="/series?genre={{ $genre->label }}">{{ $genre->label }}</a>
                    {{ $loop->last ? "" : "," }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Release</th>
                <td>{{ $series_item->startYear }}</td>
            </tr>
            <tr>
                <th>Runtime</th>
                <td>{{ $series_item->runtimeMinutes }} minutes</td>
            </tr>
            <tr>
                <th>Note</th>
                <td>{{ $series_item->averageRating }} ({{ $series_item->numVotes }} votes)</td>
            </tr>
        </table>

        <h2>Plot</h2>
        <p>
            {{ $series_item->plot }}
        </p>

        <h2>Episodes</h2>
        <p>
            @foreach ($series_item->seasons() as $seasonNumber => $episodes)
            <h3>Season {{ $seasonNumber }}</h3>
            <table>
                @foreach ($episodes->sortBy('episodeNumber') as $episodeNumber => $episode)
                <tr>
                    <td>{{ $episodeNumber }}</td>
                    <td>
                        <img src="{{ $episode->poster }}" alt="{{ $episode->originalTitle }}" style="width: 2rem">
                    </td>
                    <td>
                        <a href="/series/{{ $series_item->id }}/season/{{ $seasonNumber }}/episode/{{ $episodeNumber }}">
                            {{ $episode->originalTitle }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            @endforeach
        </p>
    </div>
</body>
</html>
