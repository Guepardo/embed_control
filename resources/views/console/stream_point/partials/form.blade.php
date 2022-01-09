<div class="card">
  <div class="card-header">
    General Info
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">Name</label>
        <input type="text" name="stream_point[name]" required class="form-control form-control-alternative"
          value="{{ old('stream_point[" name"]') ?? $resource->name }}" autofocus>
      </div>
    </div>

    </br>

    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">CDN Host</label>
        <input type="text" name="stream_point[cdn_host]" required class="form-control form-control-alternative"
          value="{{ old('stream_point[" cdn_host"]') ?? $resource->cdn_host }}" autofocus>
      </div>
    </div>

    </br>

    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">Ingest Host</label>
        <input type="text" name="stream_point[ingest_host]" required class="form-control form-control-alternative"
          value="{{ old('stream_point[" ingest_host"]') ?? $resource->ingest_host }}" autofocus>
      </div>
    </div>

    </br>

    @php
    $priority = old('stream_point["priority"]') ?? $resource->priority
    @endphp

    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">Priority </label>
        <select class="form-control" name="stream_point[priority]">
          @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ $priority==$i ? 'selected' : '' }}>
            {{ $i }}
            </option>
            @endfor
        </select>
      </div>
    </div>

    </br>

    @php
    $active = old('stream_point["active"]') ?? $resource->active
    @endphp

    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">Active? </label>
        <select class="form-control" name="stream_point[active]">
          @for ($i = 0; $i <= 1; $i++)
            <option value="{{ $i }}" {{ $active==$i ? 'selected' : '' }}>
              {{ $i == 0 ? "No" : "Yes" }}
            </option>
          @endfor
        </select>
      </div>
    </div>


  </div>
</div>

</br>

<div class="card">
  <div class="card-header">
    Credentials
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">Stream Name</label>
        <input type="text" name="stream_point[stream_name]" required class="form-control form-control-alternative"
          value="{{ old('stream_point[" stream_name"]') ?? $resource->stream_name }}" autofocus>
      </div>
    </div>

    </br>

    <div class="row">
      <div class="col">
        <label class="form-control-label" for="start_at">Stream Key</label>
        <input type="text" name="stream_point[stream_key]" required class="form-control form-control-alternative"
          value="{{ old('stream_point[" stream_key"]') ?? $resource->stream_key }}" autofocus>
      </div>
    </div>
  </div>
</div>

</br>

<div class="row">
  <div class="col">
    <a class="btn btn-secondary" href="{{ route('stream_points.index') }}">
      <i class="fas fa-arrow-left"></i> Back
    </a>
  </div>

  <div class="col text-right">
    <button type="submit" class="btn btn-primary text-right">
      <i class="fas fa-save"></i> Save
    </button>
  </div>
</div>