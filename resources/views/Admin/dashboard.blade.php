<x-layout>
  @include('_admin-header')

  <section class="px-6 py-8">
    <main class="max-w-3xl mx-auto mt-10 lg:mt-10 space-y-6">

      <!-- ERSTMAL MIT HTML GELÖST, SPÄTER MIT JAVASCRIPT BZW. VUEJS -->
      <!-- EINE NEUE VERANSTALTUNG ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Modul anlegen:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/admin/modules/create">
            @csrf
            <div class="grid-item-label-and-input">
              <label for="name">NAME DES MODULS:</label><br>
              <input type="text" name="name" id="name">
            </div>

            <div class="grid-item-label-and-input">
              <label for="courseName">STUDIENGANG:</label><br>
              <select name="course_id">
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="grid-item-label-and-input">
              <label for="profName">NAME DES PROFESSORS:</label><br>
              <select name="user_id">
                <option value="" disabled selected>Professor</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
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

      @if(auth()->user()->role == "admin")
      <div class="container-new-entry">
        <details>
          <summary>Raum anlegen:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/admin/rooms/create">
            @csrf
            <div class="grid-item-label-and-input">
              <label for="building_id">GEBÄUDE:</label><br>
              <select name="building_id">
                <option value="" disabled selected>Gebäude</option>
                @foreach($buildings as $building)
                <option value="{{$building->id}}">{{$building->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="grid-item-label-and-input">
              <label for="name">RAUMNUMMER:</label><br>
              <input type="text" name="name" id="name">
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

      <!-- EIN NEUES GEBÄUDE ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Gebäude anlegen:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/admin/buildings/create">
            @csrf

            <div class="grid-item-label-and-input">
              <label for="name">GEBÄUDENAME:</label><br>
              <input type="text" name="name" id="name">
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

      <!-- EIN NEUEN STUDIENGANG ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Studiengang anlegen:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/admin/courses/create">
            @csrf

            <div class="grid-item-label-and-input">
              <label for="name">NAME:</label><br>
              <input type="text" name="name" id="name">
            </div>

            <div class="grid-item-label-and-input">
              <label for="building_id">GEBÄUDE:</label><br>
              <select name="building_id">
                <option value="" disabled selected>Gebäude</option>
                @foreach($buildings as $building)
                <option value="{{$building->id}}">{{$building->name}}</option>
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

      <!-- EIN NEUEN USER ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>User anlegen:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/admin/users/create">
            @csrf
            <div class="grid-item-label-and-input">
              <label for="name">NAME:</label><br>
              <input type="text" name="name" id="name" id="name" value="{{old('name')}}" required>
            </div>

            <div class="grid-item-label-and-input">
              <label for="username">USERNAME:</label><br>
              <input type="text" name="username" id="username" id="username" value="{{old('username')}}" required>
            </div>

            <div class="grid-item-label-and-input">
              <label for="role">ROLLE:</label><br>
              <select id="role" name="role" required>
                <option value="prof">Professor</option>
                <option value="admin">Admin</option>
              </select>
            </div>

            <div class="grid-item-label-and-input">
              <label for="password">PASSWORT:</label><br>
              <input type="password" name="password" id="password" id="password" required>
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
          <summary>News in Raum einbinden:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/admin/news/create" enctype="multipart/form-data">
            @csrf

            <div class="grid-item-label-and-input">
              <label for="post">Post:</label><br>
              <select name="post_id">
                @foreach($posts->sortBy('author.name') as $post)
                <option value="{{$post->id}}">{{$post->author->name}}| {{$post->title}}</option>
                @endforeach
              </select>
            </div>

            <div class="grid-item-label-and-input">
              <label for="room_id">Raum:</label><br>
              <select name="room_id">
                @foreach($rooms->sortBy('building.name') as $room)
                <option value="{{$room->id}}">{{$room->building->name}} | {{$room->name}}</option>
                @endforeach
              </select>
            </div>

            <button class="add-button" type="submit">News hinzufügen</button>

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
          <summary>News in Gebäude einbinden:</summary>
          <form class="container-form-grid form-grid-gap-event" method="POST" action="/admin/news/create" enctype="multipart/form-data">
            @csrf

            <div class="grid-item-label-and-input">
              <label for="post">Post:</label><br>
              <select name="post_id">
                @foreach($posts->sortBy('author.name') as $post)
                <option value="{{$post->id}}">{{$post->author->name}}| {{$post->title}}</option>
                @endforeach
              </select>
            </div>

            <div class="grid-item-label-and-input">
              <label for="building_id">Gebäude:</label><br>
              <select name="building_id">
                @foreach($buildings->sortBy('name') as $building)
                <option value="{{$building->id}}">{{$building->name}}</option>
                @endforeach
              </select>
            </div>

            <button class="add-button" type="submit">News hinzufügen</button>

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

      <!-- EIN NEUES EVENT ANLEGEN -->
      <!-- <div class="container-new-entry">
                <details>
                    <summary>Event anlegen:</summary>
                    <form>
                        @csrf
                        <div class="new-entry-div">
                            <label for="captionName">Überschrift:</label>
                            <input type="text" id="captionName" placeholder="Überschrift">

                            <label for="picPath">Bild hochladen (optional):</label>
                            <input type="file" size="50" accept="text/*" id="picPath">

                            <button>Neues Event hinzufügen</button>
                        </div>

                    </form>
                </details>
            </div> -->
      @endif
      <!-- EINEN NEUEN RAUM ANLEGEN -->


      <!-- EINEN NEUEN POST ANLEGEN -->
      <!-- <div class="container-new-entry">
                <details>
                    <summary>Post anlegen:</summary>
                    <form method="POST" action="/admin/posts/create" enctype="multipart/form-data">
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
            </div> -->

      <!-- EIN NEUES GEBÄUDE ANLEGEN -->
      <!-- <div class="container-new-entry">
                <details>
                    <summary>Test anlegen:</summary>
                    <form method="#" action="/#">
                        @csrf
                        <div class="new-entry-div">

                            <label for="name">Name:</label>
                            <input list="rooms" name="name" id="name" placeholder="Raum">
                            <datalist id="rooms">
                                @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
                                @endforeach
                            </datalist>

                            <button type="submit">Hinzufügen</button>
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
            </div> -->


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
    /*position: absolute;
  right: 45%;
  top: 67%;*/
    font-size: 14px;
    grid-column: 1 / -1;
    margin: 0px auto 20px auto;
  }
</style>