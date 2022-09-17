@props(['buildings'])
<div class="choose-room-main-container">
    <form action="" class="choose-room-form">
        <div class="choose-room-building-container">
            @foreach($buildings as $building)
            <p class="choose-building-a"><a href='/buildings/{{$building->name}}'>{{$building->name}}</a></p>
            <div class="choose-room-room-container">
                @foreach($building->rooms as $room)
                <p class="choose-room-a"><a href='/buildings/{{$room->building->name}}/{{$room->name}}'>{{$room->name}}</a></p>
                @endforeach
            </div>
            @endforeach
        </div>
    </form>
</div>

<style>
    .choose-room-main-container>* {
        width: 100%;
        font-size: 20px;
    }

    .choose-room-building-container{
        width: 100%;
    }

    .choose-room-room-container{
        width: 100%;
    }

    .choose-room-form {
        padding: 10px;
    }

    .choose-building-a {
        margin-top: 10px;
        border-bottom: 2px solid #D9D9D9;
    }

    .choose-room-a {
        padding-left: 10px;
    }
</style>