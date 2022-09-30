<x-layout>
  <!-- Fügt die View-Componente _admin-header and die Page an -->
  @include('_admin-header')
  <!-- Padding für die Webseite -->
  <div class="px-6 py-8">
    @if ($buildings->count())
    <table class="container-table">
      <tr class="styled-tr">
        <th>Gebäudename</th>
        <th>Erstellt am:</th>
        <th>Funktion(en)</th>
      </tr>

      <!-- Such-Leiste -->
      <div class="filter">
        <form method="GET" action"#">
          <label for="building">Suche:</label><br>
          <input type="text" name="building" id="building" placeholder="Suchbegriff eingeben"
            value="{{request('building')}}">
        </form>
      </div>

      <!-- //Ausgabe der Gebäudedaten -->
      @foreach ($buildings->sortBy('name') as $building)
      <tr>
        <td> {{$building->name}} </td>
        <td> {{$building->created_at}} </td>

        <td>
          <div>
            <!-- Form zum Entfernen von Datenbankeinträgen -->
            <form class="button-center" method="POST" action="/admin/buildings/{{$building->id}}">
              @csrf
              @method('DELETE')
              <button class="delete-button" type="submit">Entfernen</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </table>
    @else
    <p>Es wurden noch keine Gebäude angelegt.</p>
    @endif
  </div>
</x-layout>

<style>
td,
th,
table {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px;
}

.container-table {
  border-collapse: collapse;
  margin: 25px auto;
  font-size: 0.9rem;
  min-width: 400px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  width: 50%;
  text-align: center;
}

.styled-tr {
  background-color: #1a2a36;
  color: #fff;
  text-align: center;
}

tr:nth-of-type(even) {
  background-color: #eee;
}

.delete-button {
  background-color: #919191;
  text-align: center;
  border-radius: 2px;
  padding: 5px;
  font-size: 15px;
  margin: 0 auto;
}

.delete-button:hover {
  background-color: #313f4a;
  transition: 0.2 ease 0s;
}

.button-center {
  text-align: center;
}

.filter {
  width: 220px;
  min-width: 220px;
  padding: 5px;
  border: 2px solid #eee;
  border-radius: 2px;
  background-color: #eee;
  margin: 0 auto;
}

.filter input {
  padding: 3px;
}
</style>