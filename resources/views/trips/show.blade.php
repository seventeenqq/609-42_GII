<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Рейс {{ $trip->id }}</title>
</head>
<body>

<h1>Рейс № {{ $trip->id }}</h1>

<h2>Информация о рейсе</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <td>{{ $trip->id }}</td>
    </tr>

    <tr>
        <th>Отправление</th>
        <td>{{ $trip->departure_at }}</td>
    </tr>

    <tr>
        <th>Прибытие</th>
        <td>{{ $trip->arrival_at }}</td>
    </tr>

    <tr>
        <th>Транспорт</th>
        <td>{{ $trip->transport->name }}</td>
    </tr>
</table>


<h2>Связанный маршрут</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID маршрута</th>
        <td>{{ $trip->route->id }}</td>
    </tr>

    <tr>
        <th>Название</th>
        <td>{{ $trip->route->name }}</td>
    </tr>

    <tr>
        <th>Тариф за кг</th>
        <td>{{ $trip->route->rate_per_kg }}</td>
    </tr>

    <tr>
        <th>Расстояние</th>
        <td>{{ $trip->route->distance_km }} км</td>
    </tr>
</table>

<br>

<a href="/trips">← Вернуться к списку рейсов</a>

</body>
</html>
