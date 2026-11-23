@extends('layouts.app')
@section('title', 'Вход в систему')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Вход в систему</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('auth') }}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                E-mail
                            </label>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Пароль
                            </label>
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit"
                                class="btn btn-primary w-100">
                            Войти
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
