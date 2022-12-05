<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search: {{ $searchQuery }}</title>

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
            <h1> Results for: {{ $searchQuery }}</h1>
        </div>

        <div>
            <table>
                @foreach ($results as $result)
                <tr>
                    <td>
                        <img class="list_image" src="{{ $result->poster }}" alt="{{ $result->primaryTitle }}">
                    </td>
                    <td>
                        @switch(class_basename($result))
                            @case('Movie')
                                <a style="text-decoration: none" href="/movies/{{ $result->id }}">
                                    {{ $result->originalTitle }}
                                </a>
                                @break
                            @case('Episode')
                                <a style="text-decoration: none" href="/series/{{ $result->series->id }}/season/{{ $result->seasonNumber }}/episode/{{ $result->episodeNumber }}">
                                    {{ $result->originalTitle }}
                                </a>
                                @break
                            @case('Series')
                                <a style="text-decoration: none" href="/series/{{ $result->id }}">
                                    {{ $result->originalTitle }}
                                </a>
                                @break

                            @default
                                <span>Unknown result type</span>
                        @endswitch
                    </td>
                    <td>{{ $result->averageRating }}/10</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
