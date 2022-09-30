<x-layout>
  <!-- Einbinden der Komponente _admin-header -->
  @include('_admin-header')
  <!-- Einbinden Padding -->
  <div class="px-6 py-8">
    <!-- Einbinden Tabelle für Datenbankeinträge -->
    @if ($courses->count())
    <table class="container-table">
      <tr class="styled-tr">
        <th>Studiengang</th>
        <th>Gebäudename</th>
        <th>Erstellt am:</th>
        <th>Funktion(en)</th>
      </tr>

      <!-- Such-Leiste -->
      <div class="filter">
        <form method="GET" action"#">
          <label for="course">Suche:</label><br>
          <input type="text" name="course" id="course" placeholder="Studiengangfilter" value="{{request('course')}}">
        </form>
      </div>
      <!-- //Ausgabe der Studiengangdaten -->
      @foreach ($courses->sortBy('name') as $course)
      <tr>
        <td> {{$course->name}} </td>
        <td> {{$course->building_id}}
        <td> {{$course->created_at}} </td>

        <td>
          <div>
            <!-- Form zum Löschen von einem Datenbankeintrag -->
            <form class="button-center" method="POST" action="/admin/courses/{{$course->id}}">
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
    <p>Es wurden noch keine Studiengänge angelegt.</p>
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
  transition: 0.2 ease 0s;
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