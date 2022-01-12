@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Update Settings
      </div>
      <div class="card-body">
        <form action="{{ route('settings.update', $resource) }}" method="POST">
          @csrf
          @method('PUT')

          @include('console.setting.partials.form')
        </form>

      </div>
    </div>
  </div>
</div>
@endsection