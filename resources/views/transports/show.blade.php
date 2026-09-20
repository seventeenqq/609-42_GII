<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Транспорт {{ $transport->id }}</title>
</head>
<body>

<h1>Транспорт № {{ $transport->id }}</h1>

<h2>Информация о транспорте</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <td>{{ $transport->id }}</td>
    </tr>

    <tr>
        <th>Название</th>
        <td>{{ $transport->name }}</td>
    </tr>

    <tr>
        <th>Грузоподъёмность</th>
        <td>{{ $transport->capacity_kg }} кг</td>
    </tr>
</table>

<h2>Маршруты этого транспорта</h2>

@if($transport->routes->count() > 0)

    <table border="1" cellpadding="8">
        <thead>
        <tr>
            <th>ID маршрута</th>
            <th>Название</th>
            <th>Тариф за кг</th>
            <th>Расстояние, км</th>
            <th>Подробнее</th>
        </tr>
        </thead>

        <tbody>
        @foreach($transport->routes as $route)
            <tr>
                <td>{{ $route->id }}</td>
                <td>{{ $route->name }}</td>
                <td>{{ $route->rate_per_kg }}</td>
                <td>{{ $route->distance_km }}</td>
                <td>
                    <a href="/routes/{{ $route->id }}">
                        Открыть маршрут
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@else

    <p>Этот транспорт пока не назначен ни на один маршрут.</p>

@endif

<br>

<a href="/routes">← К списку маршрутов</a>

</body>
</html>
