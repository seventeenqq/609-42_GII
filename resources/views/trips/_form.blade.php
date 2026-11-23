<div class="mb-3">
    <label for="route_id" class="form-label">
        Маршрут
    </label>
    <select name="route_id"
            id="route_id"
            class="form-select @error('route_id') is-invalid @enderror"
            required>
        <option value="">Выберите маршрут</option>
        @foreach($routes as $route)
            <option value="{{ $route->id }}"
                @selected(old('route_id', $trip->route_id ?? '') == $route->id)>

                {{ $route->name }}
            </option>
        @endforeach
    </select>
    @error('route_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="transport_id" class="form-label">
        Транспорт
    </label>
    <select name="transport_id"
            id="transport_id"
            class="form-select @error('transport_id') is-invalid @enderror"
            required>
        <option value="">Выберите транспорт</option>
        @foreach($transports as $transport)
            <option value="{{ $transport->id }}"
                @selected(old('transport_id', $trip->transport_id ?? '') == $transport->id)>
                {{ $transport->name }}
            </option>
        @endforeach
    </select>
    @error('transport_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="departure_at" class="form-label">
        Дата и время отправления
    </label>
    <input type="datetime-local"
           name="departure_at"
           id="departure_at"
           class="form-control @error('departure_at') is-invalid @enderror"
           value="{{ old('departure_at', isset($trip) ? \Carbon\Carbon::parse($trip->departure_at)->format('Y-m-d\TH:i') : '') }}"
           required>
    @error('departure_at')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="arrival_at" class="form-label">
        Дата и время прибытия
    </label>
    <input type="datetime-local"
           name="arrival_at"
           id="arrival_at"
           class="form-control @error('arrival_at') is-invalid @enderror"
           value="{{ old('arrival_at', isset($trip) ? \Carbon\Carbon::parse($trip->arrival_at)->format('Y-m-d\TH:i') : '') }}"
           required>
    @error('arrival_at')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
