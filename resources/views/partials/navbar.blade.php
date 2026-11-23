<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Транспортная компания
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNav"
                aria-controls="mainNav"
                aria-expanded="false"
                aria-label="Открыть меню">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/routes') }}">
                        Маршруты
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/trips') }}">
                        Рейсы
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ url('/trips/create') }}">
                            Добавить рейс
                        </a>
                    </li>
                @endauth
            </ul>
            @guest
                <a href="{{ route('login') }}"
                   class="btn btn-outline-light">
                    Войти
                </a>
            @endguest
            @auth
                <span class="text-white me-3">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="btn btn-outline-warning">
                        Выйти
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>
