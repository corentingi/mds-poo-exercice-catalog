<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Episodes</title>

    <style>
        .container {
            width: 1000px;
            margin: auto;
        }

        .list_image {
            max-width: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="padding-bottom: 1rem;">
            <button onclick="history.back()">Go Back</button>
        </div>

        <div>
            <h1> Season {{ $episodes[0]->pivot->seasonNumber ?: 'UNKNOWN' }}</h1>
        </div>

        <div>
            <table>
                @foreach ($episodes as $episode)
                <tr>
                    <td>
                        <img class="list_image" src="{{ $episode->poster }}" alt="{{ $episode->primaryTitle }}">
                    </td>
                    <td>
                        <a style="text-decoration: none" href="/series/{{ $episode->series[0]->id }}/season/{{ $episode->pivot->seasonNumber ?: 'UNKNOWN' }}/episode/{{ $episode->pivot->episodeNumber ?: $episode->id }}">
                            {{ $episode->originalTitle }}
                        </a>
                    </td>
                    <td>{{ $episode->averageRating }}/10</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
