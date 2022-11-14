<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>

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
            <table>
                @foreach ($movies as $movie)
                <tr>
                    <td>
                        <img class="list_image" src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                    </td>
                    <td>
                        <a style="text-decoration: none" href="/movies/{{ $movie->id }}">
                            {{ $movie->originalTitle }}
                        </a>
                    </td>
                    <td>{{ $movie->averageRating }}/10</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
