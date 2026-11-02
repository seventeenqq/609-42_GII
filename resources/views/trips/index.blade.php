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
<p>
    Показано {{ $trips->firstItem() ?? 0 }}
    – {{ $trips->lastItem() ?? 0 }}
    из {{ $trips->total() }} рейсов
</p>

{{ $trips->links() }}

<form action="{{ url('/trips') }}"
      method="GET"
      style="margin-top: 20px;">

    <label for="perpage">
        Элементов на странице:
    </label>

    <select name="perpage" id="perpage">

        @foreach ([3, 5, 10] as $size)
            <option value="{{ $size }}"
                @selected($perPage === $size)>
                {{ $size }}
            </option>
        @endforeach

    </select>

    <button type="submit">
        Изменить
    </button>

</form>

</body>
</html>
