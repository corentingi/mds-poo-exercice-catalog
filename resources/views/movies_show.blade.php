<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $movie->originalTitle }}</title>

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
            <a href="/">Retour</a>
        </div>

        <div>
            <img src="{{ $movie->poster }}" alt="{{ $movie->originalTitle }}">
        </div>

        <h2>Details</h2>
        <table>
            <tr>
                <th>Title</th>
                <td>{{ $movie->primaryTitle }} ({{ $movie->originalTitle }})</td>
            <tr>
                <th>Release</th>
                <td>{{ $movie->startYear }}</td>
            </tr>
            <tr>
                <th>Runtime</th>
                <td>{{ $movie->runtimeMinutes }} minutes</td>
            </tr>
            <tr>
                <th>Note</th>
                <td>{{ $movie->averageRating }} ({{ $movie->numVotes }} votes)</td>
            </tr>
        </table>

        <h2>Plot</h2>
        <p>
            {{ $movie->plot }}
        </p>
    </div>
</body>
</html>
