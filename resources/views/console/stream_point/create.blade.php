@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        New Stream Point
      </div>
      <div class="card-body">
        <form action="{{ route('stream_points.store') }}" method="POST">
          @csrf
          @include('console.stream_point.partials.form')
        </form>
      </div>
    </div>
  </div>
</div>
@endsection