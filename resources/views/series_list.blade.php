<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Series</title>

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

        <div style="margin-bottom: 2rem;">
            <strong>Genres: </strong>
            @foreach ($genres as $genre)
            <a href="/series?genre={{ $genre->label }}">{{ $genre->label }}</a>
            {{ $loop->last ? "" : "," }}
            @endforeach
        </div>

        <div>
            <table>
                @foreach ($series_paginator as $series_item)
                <tr>
                    <td>
                        <img class="list_image" src="{{ $series_item->poster }}" alt="{{ $series_item->primaryTitle }}">
                    </td>
                    <td>
                        <a style="text-decoration: none" href="/series/{{ $series_item->id }}">
                            {{ $series_item->originalTitle }}
                        </a>
                    </td>
                    <td>{{ $series_item->averageRating }}/10</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div>
            {{ $series_paginator->links('paginator') }}
        </div>
    </div>
</body>
</html>
