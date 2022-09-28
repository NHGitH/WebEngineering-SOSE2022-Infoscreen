@props(['rooms'])
<div class="choose-room-main-container">
    <h1>Liste aller Räume:</h1>
    @if($rooms->count())
    @foreach($rooms->sortBy('building_id') as $room)
    <div class="choose-room-room-container">
        <a href="/buildings/{{$room->building->name}}/{{$room->name}}">{{$room->building->name}}:{{$room->name}}</a>
    </div>
    @endforeach
    @else
    <p>Der Raum, nach dem Sie suchen, existiert nicht.</p>
    @endif
</div>

<style>
    .choose-room-main-container {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 20px;
        border: 2px solid #DEDEDE;
        border-radius: 10px;
    }

    .choose-room-room-container {
        width: 100%;
    }

    p{
        color:red;
    }
</style>