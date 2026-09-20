<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Маршрут {{ $route->id }}</title>
</head>
<body>

<h1>Маршрут № {{ $route->id }}</h1>

<p>
    <strong>Название:</strong>
    {{ $route->name }}
</p>

<p>
    <strong>Тариф за кг:</strong>
    {{ $route->rate_per_kg }}
</p>

<p>
    <strong>Расстояние:</strong>
    {{ $route->distance_km }} км
</p>

<h2>Рейсы этого маршрута</h2>

@if($route->trips->count() > 0)

    <table border="1" cellpadding="8">
        <thead>
        <tr>
            <th>ID рейса</th>
            <th>Транспорт</th>
            <th>Отправление</th>
            <th>Прибытие</th>
            <th>Подробнее</th>
        </tr>
        </thead>

        <tbody>
        @foreach($route->trips as $trip)
            <tr>
                <td>{{ $trip->id }}</td>
                <td>{{ $trip->transport->name }}</td>
                <td>{{ $trip->departure_at }}</td>
                <td>{{ $trip->arrival_at }}</td>
                <td>
                    <a href="/trips/{{ $trip->id }}">
                        Открыть рейс
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@else

    <p>У этого маршрута пока нет рейсов.</p>

@endif

<br>
<h2>Транспорт, доступный для маршрута</h2>

@if($route->transports->count() > 0)

    <table border="1" cellpadding="8">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Грузоподъёмность, кг</th>
            <th>Подробнее</th>
        </tr>
        </thead>

        <tbody>
        @foreach($route->transports as $transport)
            <tr>
                <td>{{ $transport->id }}</td>
                <td>{{ $transport->name }}</td>
                <td>{{ $transport->capacity_kg }}</td>
                <td>
                    <a href="/transports/{{ $transport->id }}">
                        Открыть транспорт
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@else

    <p>Для этого маршрута транспорт не назначен.</p>

@endif
<a href="/routes">← Вернуться к списку маршрутов</a>

</body>
</html>
