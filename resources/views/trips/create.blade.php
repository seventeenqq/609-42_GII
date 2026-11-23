@extends('layouts.app')

@section('title', 'Добавить рейс')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <div class="card shadow-sm">

                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Добавление рейса</h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ url('/trips') }}">
                        @csrf

                        @include('trips._form')

                        <button type="submit" class="btn btn-success">
                            Добавить рейс
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
