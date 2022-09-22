@props(['building'])
<div>
    <h1>Das ist das {{$building->name}}-Gebäude</h1>
    <h2>Liste der Räume:</h2>
    @if ($building->rooms->count())

    @foreach ($building->rooms as $indexKey => $room)
    <p>{{$indexKey+1}}:{{$room->name}}</p>
    @endforeach

    @else
    <p class="text-center">No posts yet. Please check again later.</p>
    @endif
</div>