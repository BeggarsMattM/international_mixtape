<ul>
@foreach ($playlists->items as $playlist)
<li>{{ $playlist->name }} ({{ $playlist->id }})</li>
@endforeach
</ul>
