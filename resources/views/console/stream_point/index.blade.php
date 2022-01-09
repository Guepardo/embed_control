@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  {{-- Fast Actions --}}
  <div class="col-md-12 mb-5">
    <div class="card">
      <div class="card-header">
        Fast Actions
      </div>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col">
            <div class="row justify-content-center">
              <a href="{{ route('stream_points.create') }}" class="btn btn-primary p-4">
                Register
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Table --}}
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Stream Points
      </div>
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Priority</th>
              <th scope="col">Nome</th>
              <th scope="col">Active</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($collection as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->priority }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->active ? "Yes" : "No" }}</td>
              <td>
                <a class="btn btn-link" href="{{ route('stream_points.edit', $item) }}">
                  Update
                </a>
              </td>
            </tr>
            @empty
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-center">
        {!! $collection->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection