@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        Update Stream Point
      </div>
      <div class="card-body">
        <form action="{{ route('stream_points.update', $resource) }}" method="POST">
          @csrf
          @method('PUT')

          @include('console.stream_point.partials.form')
        </form>

      </div>
    </div>
  </div>
</div>
@endsection