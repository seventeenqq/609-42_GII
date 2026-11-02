@if ($paginator->hasPages())
    <nav aria-label="Пагинация"
         style="display:flex; gap:10px;
                align-items:center; margin:15px 0;
                flex-wrap:wrap;">

        <a href="{{ $paginator->url(1) }}">
            Первая
        </a>

        @if ($paginator->onFirstPage())
            <span>Назад</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">
                Назад
            </a>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <span>{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())
                        <strong aria-current="page">
                            {{ $page }}
                        </strong>
                    @else
                        <a href="{{ $url }}">
                            {{ $page }}
                        </a>
                    @endif

                @endforeach
            @endif

        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                Вперёд
            </a>
        @else
            <span>Вперёд</span>
        @endif

        <a href="{{ $paginator->url($paginator->lastPage()) }}">
            Последняя
        </a>

    </nav>
@endif
