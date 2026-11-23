@extends('layouts.app')

@section('title', 'Редактирование рейса')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <div class="card shadow-sm">

                <div class="card-header bg-warning">
                    <h4 class="mb-0">
                        Редактирование рейса №{{ $trip->id }}
                    </h4>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ url('/trips/' . $trip->id) }}">

                        @csrf
                        @method('PUT')

                        @include('trips._form')

                        <button type="submit" class="btn btn-primary">
                            Сохранить изменения
                        </button>

                        <a href="{{ url('/trips') }}"
                           class="btn btn-secondary">
                            Отмена
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
