@extends('layouts.app')
@section('title', 'Список рейсов')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Список рейсов</h1>
        @auth
            <a href="{{ url('/trips/create') }}"
               class="btn btn-success">
                + Добавить рейс
            </a>
        @endauth
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Маршрут</th>
                        <th>Транспорт</th>
                        <th>Отправление</th>
                        <th>Прибытие</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($trips as $trip)
                        <tr>
                            <td>{{ $trip->id }}</td>
                            <td>{{ $trip->route->name }}</td>
                            <td>{{ $trip->transport->name }}</td>
                            <td>{{ $trip->departure_at }}</td>
                            <td>{{ $trip->arrival_at }}</td>
                            <td>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ url('/trips/' . $trip->id) }}"
                                       class="btn btn-info btn-sm">
                                        Открыть
                                    </a>
                                    @can('edit-trip', $trip)
                                        <a href="{{ url('/trips/' . $trip->id . '/edit') }}"
                                           class="btn btn-warning btn-sm">
                                            Редактировать
                                        </a>
                                    @endcan
                                    @can('delete-trip', $trip)

                                        <form method="POST"
                                              action="{{ url('/trips/' . $trip->id) }}"
                                              onsubmit="return confirm('Удалить рейс?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">
                                                Удалить
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="text-center text-muted">
                                Рейсы не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">
                <form method="GET"
                      action="{{ url('/trips') }}"
                      class="d-flex align-items-center gap-2">
                    <label for="perpage" class="form-label mb-0">
                        На странице:
                    </label>
                    <select name="perpage"
                            id="perpage"
                            class="form-select form-select-sm w-auto">
                        @foreach([3, 5, 10] as $size)
                            <option value="{{ $size }}"
                                @selected($perPage == $size)>
                                {{ $size }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Показать
                    </button>
                </form>
            </div>
            <div class="mt-4">
                {{ $trips->links() }}
            </div>
        </div>
    </div>
@endsection
