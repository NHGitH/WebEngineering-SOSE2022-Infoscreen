<x-layout>
    @include('_dashboard-header')
    <div class="container-new-entry">
        <summary>Veranstaltung aktualisieren:</summary>
        <form method="POST" action="/dashboard/lessons/{{$lesson->id}}">
            @csrf
            @method('PATCH')
            <div class="new-entry-div">
                <div class="test">
                    <label for="module_id">Modul:</label>
                    <select name="module_id">
                        @foreach(auth()->user()->modules->sortBy('name') as $module)
                        <option value="{{$module->id}}">{{$module->name}} | {{$module->course->name}}</option>
                        @endforeach
                    </select>

                    <label for="room_id">Raum:</label>
                    <select name="room_id">
                        <option value="" disabled selected>Raum</option>
                        @foreach($rooms->sortBy('building.name') as $room)
                        <option value="{{$room->id}}">{{$room->building->name}}-{{$room->name}}</option>
                        @endforeach
                    </select>

                    <label for="date">Veranstaltungsdatum:</label>
                    <input type="date" name="date" id="date" placeholder="$lesson->date">

                    <label for="time">Veranstaltungszeit:</label>
                    <input type="time" name="time" id="time">

                    <button class="add-button" type="submit">AKTUALISIEREN</button>
                </div>
            </div>
            
            @if($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="color:red;">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
        </form>
    </div>
</x-layout>

<style>

    .add-button{
        color: black;
    }
    
    form>a {
        border: 1px solid #DEDEDE;
        padding: 4px;
        border-radius: 10px;
    }

    .container-new-entry {
        padding: 10px;
        border: 2px solid black;
        border-radius: 5px;

        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.165);
        background-color: rgba(204, 204, 204, 0.2);
        margin: 0 auto;
        border-radius: 10px;
    }

    .container-new-entry form div {
        display: grid;
        grid-template-columns: 200px 1fr;
        grid-row-gap: 5px;
    }

    .container-new-entry form div label {
        grid-column: 1 / 2;
        grid-row-gap: 20px;
    }
</style>