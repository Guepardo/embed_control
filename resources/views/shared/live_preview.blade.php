<div class="card mb-3">
  <div class="card-header">{{ $item['name'] }}</div>
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