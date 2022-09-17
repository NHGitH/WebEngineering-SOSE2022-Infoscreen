@props(['building'])
<section>
    <div class="head-container">
        <img class="hochschuleLogo" src="/images/Logo_der_Hochschule_Flensburg.png" width="150px">
        <h1 class="welcome">Willkommen im {{$building->name}}-Gebäude</h1>
        <div class="clock">
            <h1 class="time">{{
        date('H:i:s')}}</h1>
        </div>
    </div>

    <div class="main-container">
        <div class="module-card">
            @if ($building->rooms->count())
            @foreach ($building->rooms as $room)
            @foreach($room->modules()
            ->orderby('time','desc')
            ->take(1)
            ->get() as $module)
            <x-module_card :module=$module />
            @endforeach
            @endforeach
            @endif
        </div>
        <div class="event-container">
            
        </div>
    </div>
</section>


<style>
    .head-container {
        width: 100%;
        display: grid;
        grid-template-columns: 20% 60% 20%;
        align-items: center;
        justify-items: center;
        border-bottom: 2px solid #D9D9D9;
        padding-bottom: 20px;
    }

    .main-container {
        width: 100%;
        display: grid;
        grid-template-columns: 30% 70%;
        align-items: center;
        justify-items: center;
        border-bottom: 2px solid #D9D9D9;
    }

    .module-card {
        background-color: grey;
        grid-column-start: 1;
        width: 100%;
    }

    .hochschuleLogo {
        grid-column-start: 1;
    }

    .time {
        font-size: x-large;
        text-align: center;
    }

    .welcome {
        font-size: x-large;
        text-align: center;
    }

    .clock {
        border: 2px solid #D9D9D9;
        border-radius: 10px;
        padding: 10px;
    }
</style>