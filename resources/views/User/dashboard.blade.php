<x-layout>
    @include('_dashboard-header')

    <section class="px-6 py-8">
        <main class="max-w-3xl mx-auto mt-10 lg:mt-10 space-y-6">
            @if(auth()->user()->modules->count())
            <div class="container-new-entry">
                <details>
                    <summary>Veranstaltung anlegen:</summary>
                    <form class="container-form-grid form-grid-gap-event" method="POST" action="/dashboard/lessons/create">
                        @csrf
                        <div class="grid-item-label-and-input">
                            <label for="module_id">MODUL:</label><br>
                            <select name="module_id">
                                @foreach(auth()->user()->modules->sortBy('name') as $module)
                                <option value="{{$module->id}}">{{$module->name}} | {{$module->course->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid-item-label-and-input">
                            <label for="room_id">RAUM:</label><br>
                            <select name="room_id">
                                <option value="" disabled selected>Bitte auswählen</option>
                                @foreach($rooms->sortBy('building.name') as $room)
                                <option value="{{$room->id}}">{{$room->building->name}}-{{$room->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid-item-label-and-input">
                            <label for="date">VERANSTALTUNGSDATUM:</label><br>
                            <input type="date" name="date" id="date">
                        </div>

                        <div class="grid-item-label-and-input">
                            <label for="time">VERANSTALTUNGSZEIT:</label><br>
                            <input type="time" name="time" id="time">
                        </div>

                        <button class="add-button" type="submit">HINZUFÜGEN</button>

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

            <div class="container-new-entry">
                <details>
                    <summary>Meine nächsten Veranstaltungen:</summary>
                    @foreach(auth()->user()->modules->sortby('name') as $module)
                    <p class="next-lessons-module">{{$module->name}} | {{$module->course->name}}</p>
                    @foreach($module->lessons()->where('date', '>=', date('Y-m-d'))->take(1)->get() as $lesson)
                    <p class="next-lessons">{{$lesson->date}} | {{$lesson->time}}</p>
                    @endforeach
                    @endforeach
                </details>
            </div>
      @endif

      <!-- EINEN NEUEN POST ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Post anlegen:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/dashboard/posts/create"
            enctype="multipart/form-data">
            @csrf

            <div class="grid-item-label-and-input">
              <label for="title">ÜBERSCHRIFT:</label><br>
              <input type="text" name="title" id="title">
            </div>

            <div class="grid-item-label-and-input">
              <label for="image">BILD HOCHLADEN (nur png Dateien):</label><br>
              <input type="file" size="5000" accept="image/png" name="image" id="image">
            </div>

            <div class="grid-item-label-and-input grid-textarea">
              <label for="body">INHALT:</label><br>
              <textarea id="body" name="body" rows="4" cols="88"></textarea>
            </div>

            <button class="add-button" type="submit">HINZUFÜGEN</button>

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

      <!-- MEINE LETZTEN POSTS -->
      <div class="container-last-posts">
        <details>
          <summary>Meine letzten Posts:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/dashboard/posts/create">
            @if(auth()->user()->posts->count())
            @foreach(auth()->user()->posts->take(4) as $post)
            <x-post-card :post=$post />
            @endforeach
            @else
            <p style="color:red">Du hast bisher noch keine Posts gemacht.</p>
            @endif
          </form>
        </details>
      </div>

      <div class="container-new-entry">
        <details>
          <summary>News in Modul einbinden:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/dashboard/news/create"
            enctype="multipart/form-data">
            @csrf

            <div class="grid-item-label-and-input">
              <label for="post">POST:</label><br>
              <select name="post_id">
                @foreach(auth()->user()->posts->sortBy('name') as $post)
                <option value="{{$post->id}}">{{$post->title}}</option>
                @endforeach
              </select>
            </div>

            <div class="grid-item-label-and-input">
              <label for="module_id">MODUL:</label><br>
              <select name="module_id">
                @foreach(auth()->user()->modules->sortBy('name') as $module)
                <option value="{{$module->id}}">{{$module->name}} | {{$module->course->name}}</option>
                @endforeach
              </select>
            </div>

            <button class="add-button" type="submit">HINZUFÜGEN</button>

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

    .next-lessons{
        margin-left: 30px;
    }

    .next-lessons-module{
        margin-top: 10px;
        margin-left: 20px;
    }

    .container-form-grid {
        display: grid;
        grid-template-columns: 2fr 2fr;
        grid-template-rows: 1fr 1fr 1fr;
    }

    .form-grid-gap-event {
        grid-row-gap: 20px;
    }

    .form-grid-gap-post {
        grid-row-gap: 0;
        grid-template-rows: 80px 150px 61px;
    }

    summary {
        outline: none;
        padding: 1rem;
        display: block;
        background: #1a2a36;
        color: #fff;
        padding-left: 1rem;
        position: relative;
        cursor: pointer;
        margin-bottom: 20px;
        font-weight: bold;
    }

    summary:focus {
        border-color: black;
    }

    details {
        max-width: auto;
        box-sizing: border-box;
        margin-top: 0px;
        background-color: #DEDEDE;
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
        top: 1.3rem;
        right: 2rem;
        /*left: 1rem;*/
        transform: rotate(0);
        transform-origin: .2rem 50%;
        transition: 0.2s transform ease 0s;
    }

    form>a {
        border: 1px solid #DEDEDE;
        padding: 4px;
        border-radius: 10px;
    }

    .container-new-entry {
        padding: 10px;
        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.165);
        background-color: rgba(204, 204, 204, 0.2);
        margin: 0 auto;
        border-radius: 2px;
        min-width: 700px;
    }

    .container-last-posts {
        padding: 10px;
        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.165);
        background-color: rgba(204, 204, 204, 0.2);
        margin: 0 auto;
        border-radius: 2px;
        min-width: 700px;
    }

    .container-last-posts h1 {
        font-size: 18px;
    }

    .container-last-posts p {
        font-size: 12px;
    }

    article {
        margin: 0 10px;
        padding-left: 10px;
    }

    .card_container {
        background-color: white;
        margin: 0 auto;
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

    /*-----------------------------------*/
    /*----- NEUES DESIGN DASHBOARD ------*/
    /*-----------------------------------*/

    .grid-item-label-and-input {
        margin: 0 auto;
        padding: 0;
    }

    .grid-item-label-and-input label {
        font-size: 80%;
        font-weight: bold;
    }

    .grid-item-label-and-input select {
        width: 200px;
        height: 28px;
        font-size: 90%;
    }

    .grid-textarea {
        grid-column: 1 / -1;
        resize: horizontal;
    }

    textarea {
        font-size: 12px;
    }

    input {
        border: none;
        height: 28px;
        font-size: 80%;
        width: 200px;
        padding: 5px;
    }

    input[type="file"] {
        width: 250px;
    }

    button {
        background-color: #313131;
        color: #fff;
        border: none;
        padding: 10px 25px;
        margin: 0 auto;
        transition: 0.2s;
        border-radius: 2px;
    }

    button:hover {
        background-color: #616161;
        transition: 0.2s;
    }

    .logout-button {
        background-color: #919191;
        color: #edf0f1;
        width: 100px;
    }

    .add-button {
        font-size: 14px;
        grid-column: 1 / -1;
        margin: 0px auto 20px auto;
    }
</style>