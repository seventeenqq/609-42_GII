
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Маршруты</title>
</head>
<body>

<h1>Список маршрутов</h1>

<table border="1" cellpadding="8">
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Тариф за кг</th>
        <th>Расстояние, км</th>
        <th>Подробнее</th>
    </tr>
    </thead>

    <tbody>
@foreach($routes as $route)
    <tr>
        <td>{{ $route->id }}</td>
        <td>{{ $route->name }}</td>
        <td>{{ $route->rate_per_kg }}</td>
        <td>{{ $route->distance_km }}</td>
        <td>
            <a href="/routes/{{ $route->id }}">
                Открыть
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>

    </body>
    </html>
