<x-layout>
  <nav class="navbar">
    <!-- Navigationsmenü -->
    <ul class="nav-links">

      <div class="menu">
        <li><a href="#">Hochschule Flensburg</a></li>
        <li><a href="#">Administration von: <strong>{{$user->name}}</strong></a></li>
        <li><a href="#">Logout</a></li>
      </div>

    </ul>
  </nav>
  <section class="px-6 py-8">
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">



      <!-- ERSTMAL MIT HTML GELÖST, SPÄTER MIT JAVASCRIPT BZW. VUEJS -->
      <!-- EINE NEUE VERANSTALTUNG ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Veranstaltung anlegen:</summary>
          <form>

            <div class="new-entry-div">
              <div class="test">
                <label for="moduleName">Name des Moduls:</label>
                <input type="text" id="moduleName" placeholder="Modulname">
              </div>


              <label for="courseName">Studiengang:</label>
              <input type="text" id="courseName" placeholder="Studiengang">

              <label for="buildingName">Gebäude:</label>
              <select name="building">
                <option value="" disabled selected>Gebäude</option>
                @foreach($buildings as $building)
                <option value="{{$building->name}}">{{$building->name}}</option>
                @endforeach
              </select>

              <label for="buildingID">Gebäude ID:</label>
              <input type="text" id="buildingID" placeholder="Gebäude ID">

              <label for="roomID">Raumnummer:</label>
              <input type="text" id="roomID" placeholder="Raumnummer">

              <label for="profName">Name des Professors:</label>
              <input type="text" id="profName" placeholder="Professor Name">

              <label for="picPath">Bild hochladen (optional):</label>
              <input type="file" size="50" accept="text/*" id="picPath">

              <button>Neue Veranstaltung hinzufügen</button>
            </div>

          </form>
        </details>
      </div>

      <!-- EINEN NEUEN RAUM ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Raum anlegen:</summary>
          <form>

            <div class="new-entry-div">
              <label for="buildingName">Gebäude:</label>
              <select name="building">
                <option value="" disabled selected>Gebäude</option>
                @foreach($buildings as $building)
                <option value="{{$building->name}}">{{$building->name}}</option>
                @endforeach
              </select>

              <label for="roomID">Raumnummer:</label>
              <input type="text" id="roomID" placeholder="Raumnummer">

              <button>Neuen Raum hinzufügen</button>
            </div>

          </form>
        </details>
      </div>

      <!-- EIN NEUES GEBÄUDE ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Gebäude anlegen:</summary>
          <form>

            <div class="new-entry-div">

              <label for="buildingName">Name:</label>
              <input type="text" id="buildingName" placeholder="Gebäude">

              <button>Neuen Raum hinzufügen</button>
            </div>

          </form>
        </details>
      </div>

      <!-- EIN NEUES EVENT ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Event anlegen:</summary>
          <form>

            <div class="new-entry-div">
              <label for="captionName">Überschrift:</label>
              <input type="text" id="captionName" placeholder="Überschrift">

              <label for="published">Veröffentlicht am:</label>
              <input type="date" id="published">

              <label for="picPath">Bild hochladen (optional):</label>
              <input type="file" size="50" accept="text/*" id="picPath">

              <button>Neues Event hinzufügen</button>
            </div>

          </form>
        </details>
      </div>

      <!-- EINEN NEUEN POST ANLEGEN -->
      <div class="container-new-entry">
        <details>
          <summary>Post anlegen:</summary>
          <form>

            <div class="new-entry-div">

              <label for="captionName">Überschrift:</label>
              <input type="text" id="captionName" placeholder="Überschrift">

              <label for="authorName">Autor:</label>
              <input type="text" id="authorName" placeholder="Autor">

              <label for="published">Veröffentlicht am:</label>
              <input type="date" id="published">

              <label for="picPath">Bild hochladen (optional):</label>
              <input type="file" size="50" accept="text/*" id="picPath">

              <label for="userText">Inhalt:</label>
              <textarea id="userText" rows="4" cols="50"></textarea>

              <button>Neuen Post hinzufügen</button>
            </div>

          </form>
        </details>
      </div>

      <!-- <x-database-entry/> -->
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

/*
html {
  background: url("/images/stacked-waves-haikei.svg") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
*/

summary {
  border: 4px solid transparent;
  outline: none;

  &:focus {
    border-color: black;
  }

  padding: 1rem;
  display: block;
  background: #444;
  color: white;
  padding-left: 2.5rem;
  position: relative;
  cursor: pointer;
  margin-bottom: 20px;
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
}
</style>