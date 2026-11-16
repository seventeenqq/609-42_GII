<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>

    <style>
        .is-invalid {
    color: red;
}
</style>
</head>
<body>

@if($user)

    <h2>Здравствуйте, {{ $user->name }}!</h2>

    <form method="POST" action="{{ url('logout') }}">
        @csrf
        <button type="submit">Выйти из системы</button>
    </form>

@else

    <h2>Вход в систему</h2>

    <form method="POST" action="{{ url('auth') }}">
        @csrf

        <label>E-mail</label>
        <input
            type="text"
            name="email"
            value="{{ old('email') }}"
        >

        @error('email')
        <div class="is-invalid">{{ $message }}</div>
        @enderror

        <br>

        <label>Пароль</label>
        <input type="password" name="password">

        @error('password')
        <div class="is-invalid">{{ $message }}</div>
        @enderror

        <br>

        <input type="submit" value="Отправить">

    </form>

    @error('error')
    <div class="is-invalid">{{ $message }}</div>
    @enderror

    @endif

    </body>
    </html>
