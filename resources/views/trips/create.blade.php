<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление рейса</title>

    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h1>Добавление рейса</h1>

<form method="POST" action="/trips">
    @csrf

    <div>
        <label>Маршрут:</label>

        <select name="route_id">
            <option value="">-- Выберите маршрут --</option>

            @foreach($routes as $route)
                <option value="{{ $route->id }}"
                        @if(old('route_id') == $route->id) selected @endif>
                    {{ $route->name }}
                </option>
            @endforeach
        </select>

        @error('route_id')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <div>
        <label>Транспорт:</label>

        <select name="transport_id">
            <option value="">-- Выберите транспорт --</option>

            @foreach($transports as $transport)
                <option value="{{ $transport->id }}"
                        @if(old('transport_id') == $transport->id) selected @endif>
                    {{ $transport->name }}
                </option>
            @endforeach
        </select>

        @error('transport_id')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <div>
        <label>Дата и время отправления:</label>

        <input
            type="datetime-local"
            name="departure_at"
            value="{{ old('departure_at') }}"
        >

        @error('departure_at')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <div>
        <label>Дата и время прибытия:</label>

        <input
            type="datetime-local"
            name="arrival_at"
            value="{{ old('arrival_at') }}"
        >

        @error('arrival_at')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <button type="submit">Добавить рейс</button>
</form>

<br>

<a href="/trips">← Вернуться к списку рейсов</a>

</body>
</html>
