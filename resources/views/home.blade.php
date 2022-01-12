@extends('layouts.app')

@push('scripts')
<script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js">
</script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @foreach ($collection as $item)
                    <div class="row">
                        <div class="col">
                            @include('shared.live_preview', ['item' => $item[0]])
                        </div>
                        <div class="col">
                            @isset($item[1])
                                @include('shared.live_preview', ['item' => $item[1]])
                            @endisset
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection