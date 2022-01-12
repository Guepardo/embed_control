<div class="card mb-3">
  <div class="card-header">
    Name: <b>{{ $item['name'] }}</b> | Priority: {{ $item['priority'] }}

    @if ($item['active'])
    <form action="{{ route('stream_point_active.destroy', $item['id']) }}" method="POST" class="float-right">
      @method('DELETE')
      @csrf
      <button class="btn btn-light">Inactive</button>
    </form>
    @else
    <form action="{{ route('stream_point_active.store', $item['id']) }}" method="POST" class="float-right">
      @csrf
      <input type="hidden" name="id" value="{{$item['id']}}">

      <button class="btn btn-success">Active</button>
    </form>
    @endif
  </div>
  <div class="card-body">
    <div class="row">
      <div id="player-{{ $item['id'] }}" style="height:360px;width: 100%;"></div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  var player = new Clappr.Player({
    source: "{{ $item['cdn_host'] }}",
    parentId: "#player-{{ $item['id'] }}",
    height: "100%",
    width: "100%"
  })
</script>
@endpush