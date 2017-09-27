<ul>
@foreach ($playlists->items as $playlist)
<li>{{ $playlist->name }} ({{ $playlist->id }})</li>
@endforeach
</ul>
<select class="crs-country" data-region-id="ABC"></select>
<select id="ABC"></select>
<script src="js/crs.min.js"></script>
<script>
$("#ABC").change(function () {
  alert("#ABC").val();
});
</script>
