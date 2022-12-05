<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $episode->originalTitle }}</title>

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
            <img src="{{ $episode->poster }}" alt="{{ $episode->originalTitle }}">
        </div>

        <h2>Details</h2>
        <table>
            <tr>
                <th>Title</th>
                <td>{{ $episode->primaryTitle }} ({{ $episode->originalTitle }})</td>
            </tr>
            <tr>
                <th>Series</th>
                <td>
                    <a style="text-decoration: none" href="/series/{{ $episode->series->id }}">
                        {{ $episode->series->primaryTitle }} ({{ $episode->series->originalTitle }})
                    </a>
                </td>
            </tr>
            <tr>
                <th>Season</th>
                <td>
                    <a style="text-decoration: none" href="/series/{{ $episode->series->id }}/season/{{ $episode->seasonNumber ?: 'UNKNOWN' }}">
                        {{ $episode->seasonNumber ?: 'N/D' }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Episode</th>
                <td>{{ $episode->episodeNumber ?: 'N/D' }}</td>
            </tr>
            <tr>
                <th>Genres</th>
                <td>
                    @foreach ($episode->genres as $genre)
                    <a href="/series?genre={{ $genre->label }}">{{ $genre->label }}</a>
                    {{ $loop->last ? "" : "," }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Release</th>
                <td>{{ $episode->startYear }}</td>
            </tr>
            <tr>
                <th>Runtime</th>
                <td>{{ $episode->runtimeMinutes }} minutes</td>
            </tr>
            <tr>
                <th>Note</th>
                <td>{{ $episode->averageRating }} ({{ $episode->numVotes }} votes)</td>
            </tr>
        </table>

        <h2>Plot</h2>
        <p>
            {{ $episode->plot }}
        </p>
    </div>
</body>
</html>
