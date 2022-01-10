<div class="card">
  <div class="card-header">
    General Info
  </div>
  <div class="card-body">
    @php
    $list = [
    "Round Robin" => "round_robin",
    'Priority' => "priority"
    ];

    $balance_strategy = old('setting["balance_strategy"]') ?? $resource->balance_strategy

    @endphp

    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">Balance Strategy </label>
        <select class="form-control" name="setting[balance_strategy]">
          @foreach ($list as $item => $value)
          <option value="{{ $value }}" {{ $balance_strategy==$value ? 'selected' : '' }}>
            {{ $item }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

    </br>

    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">Revalidate Seconds</label>
        <input type="number" name="setting[revalidate_seconds]" required class="form-control form-control-alternative"
          value="{{ old('setting[" revalidate_seconds"]') ?? $resource->revalidate_seconds }}" autofocus>
      </div>
    </div>

    </br>

    <div class="alert alert-warning" role="alert">
      <p>Balance Strategy:</p>
      <ul>
        <li>
          <b>Priority:</b> sempre o ponto com maior prioridade será entregue a cada revalidação do cache.
        </li>
        <li>
          <b>Round Robin:</b> A cada revalidação de cache um novo ponto será entregue.
        </li>
      </ul>
      <p>Revalidate Seconds:</p>
      <ul>
        <li>
          Tempo em segundos para revalidação do cache na borda da CDN.
        </li>
      </ul>
    </div>
  </div>
</div>

</br>

<div class="row">
  <div class="col">
    <a class="btn btn-secondary" href="{{ route('settings.index') }}">
      <i class="fas fa-arrow-left"></i> Back
    </a>
  </div>

  <div class="col text-right">
    <button type="submit" class="btn btn-primary text-right">
      <i class="fas fa-save"></i> Save
    </button>
  </div>
</div>