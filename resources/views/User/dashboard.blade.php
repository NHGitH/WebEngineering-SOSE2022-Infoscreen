<x-layout>
    @include('_dashboard-header')

    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-10 space-y-6">



            <!-- ERSTMAL MIT HTML GELÖST, SPÄTER MIT JAVASCRIPT BZW. VUEJS -->
            <!-- EINE NEUE VERANSTALTUNG ANLEGEN -->
            @if(auth()->user()->modules->count())
            <div class="container-new-entry">
                <details>
                    <summary>Veranstaltung anlegen:</summary>
                    <form method="POST" action="/dashboard/lessons/create">
                        @csrf
                        <div class="new-entry-div">
                            <div class="test">
                            <label for="courseName">Modul:</label>
                            <select name="module_id">
                                @foreach(auth()->user()->modules as $module)
                                <option value="{{$module->id}}">{{$module->name}}</option>
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
                            <input type="date" name="date" id="date">

                            <label for="time">Veranstaltungszeit:</label>
                            <input type="time" name="time" id="time">

                            <button type="submit">hinzufügen</button>
                        </div>

                        @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </form>
                </details>
            </div>
            @endif

            <!-- EINEN NEUEN POST ANLEGEN -->
            <div class="container-new-entry">
                <details>
                    <summary>Post anlegen:</summary>
                    <form method="POST" action="/dashboard/posts/create" enctype="multipart/form-data">
                        @csrf
                        <div class="new-entry-div">

                            <label for="title">Überschrift:</label>
                            <input type="text" name="title" id="title" placeholder="Überschrift">

                            <label for="image">Bild hochladen (nur png Dateien):</label>
                            <input type="file" size="5000" accept="image/png" name="image" id="image">
                            <label for="body">Inhalt:</label>
                            <textarea id="body" name="body" rows="4" cols="50"></textarea>

                            <button type="submit">Neuen Post hinzufügen</button>
                        </div>
                    </form>
                </details>
            </div>
            <div>
                <h1>Meine Posts:</h1>
                @if(auth()->user()->posts->count())
                @foreach(auth()->user()->posts as $post)
                <x-post-card :post=$post />
                @endforeach
                @else
                <p style="color:red">Du hast bisher noch keine Posts gemacht.</p>
                @endif
            </div>

            <h1>Raumanzeige</h1>

            <p>Raum auswählen:</p>
            <div class="select-room">
                <form method="GET" action"#">
                    <select name="building">
                        <option value="" disabled selected>Gebäude</option>
                        @foreach($buildings as $building)
                        <option value="{{$building->name}}">{{$building->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="search" placeholder="Raum auswählen">
                </form>

                <x-choose-room :rooms=$rooms :buildings=$buildings />
            </div>
        </main>
    </section>
</x-layout>

<!--------->
<!--------->
<!-- CSS -->
<!--------->
<!--------->

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    summary {
        border: 4px solid transparent;
        outline: none;
        padding: 1rem;
        display: block;
        background: #444;
        color: white;
        padding-left: 2.5rem;
        position: relative;
        cursor: pointer;
        margin-bottom: 20px;
    }

    summary:focus {
        border-color: black;
    }


    details {
        max-width: auto;
        box-sizing: border-box;
        margin-top: 5px;
        background: white;
    }

    details summary::-webkit-details-marker {
        display: none;
    }

    details[open]>summary:before {
        transform: rotate(90deg);
    }

    summary:before {
        content: '';
        border-width: .4rem;
        border-style: solid;
        border-color: transparent transparent transparent #fff;
        position: absolute;
        top: 0.3rem;
        left: 1rem;
        transform: rotate(0);
        transform-origin: .2rem 50%;
        transition: .25s transform ease;
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

    /*
.test {
  display: flex;
  align-items: center;
  grid-column-start: 1;
  grid-column-end: 2;
}
*/

    input {
        grid-column: 2 / 3;
        margin-bottom: 20px;
    }

    button {
        grid-column: 1 / 3;
        width: 12rem;
        height: 3.5rem;
        margin: 0 auto 10px auto;
        border: 1px solid black;
        border-radius: 5px;
        background-color: #AEBD93;
        color: #363636;
    }

    button:hover {
        background-color: #7A8450;
    }

    select,
    input {
        border: 2px solid #DEDEDE;
        padding: 5px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /*----------------*/
    /*---- NAVBAR ----*/
    /*----------------*/

    nav a {
        text-decoration: none;
    }

    nav a li {
        list-style: none;
    }

    .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        background-color: teal;
        color: #fff;
    }

    .nav-links {
        color: #fff;
    }

    .menu {
        display: flex;
        gap: 1em;
        font-size: 18px;
    }

    .menu li:hover {
        background-color: #4c9e9e;
        border-radius: 5px;
        transition: 0.3s ease;
    }

    .menu li {
        padding: 5px 14px;
        align-self: center;
    }

    form>ul>li {
        color: red;
    }
</style>