<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Рейсы</title>
</head>
<body>

<h1>Список рейсов</h1>

<table border="1" cellpadding="8">
    <thead>
    <tr>
        <th>ID</th>
        <th>Маршрут</th>
        <th>Транспорт</th>
        <th>Отправление</th>
        <th>Прибытие</th>
        <th>Подробнее</th>
        <th>Действия</th>
    </tr>
    </thead>

    <tbody>
    @foreach($trips as $trip)
        <tr>
            <td>{{ $trip->id }}</td>
            <td>{{ $trip->route->name }}</td>
            <td>{{ $trip->transport->name }}</td>
            <td>{{ $trip->departure_at }}</td>
            <td>{{ $trip->arrival_at }}</td>
            <td>
                <a href="/trips/{{ $trip->id }}">
                    Открыть
                </a>
            </td>
            <td>
                <a href="/trips/{{ $trip->id }}/edit">
                    Редактировать
                </a>

                <form action="/trips/{{ $trip->id }}" method="POST" style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Удалить этот рейс?')">
                        Удалить
                    </button>

                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
