<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genres</title>

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
            <ul>
                @foreach ($genres as $genre)
                <li>
                    {{ $genre->label }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
