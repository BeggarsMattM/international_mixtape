<ul>
@foreach ($playlists->items as $playlist)
<li>{{ $playlist->name }} ({{ $playlist->id }})</li>
@endforeach
</ul>
<select class="crs-country" data-region-id="ABC"></select>
<select id="ABC"></select>
<div id="results">
</div>
<script src="js/crs.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$("#ABC").change(function () {
  var region = $("#ABC option:selected").val();
  $.post({
    url: "/search",
    data: { region: encodeURIComponent(region), _token: '{{ csrf_token() }}' },
    dataType: "json"
  }).done(function (data) {
    $('#results').empty();
    for (i = 0; i < data.value.length; i++) {
     $('#results').append('<div><img src="' + data.value[i].contentUrl + '"></div>');
    }
  });
});
</script>
