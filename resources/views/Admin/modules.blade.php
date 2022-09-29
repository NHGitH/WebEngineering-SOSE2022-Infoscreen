<x-layout>
  @include('_admin-header')

  <div class="px-6 py-8">
    @if ($modules->count())
    <table class="container-table">
      <tr class="styled-tr">
        <th>Modulname</th>
        <th>Professor</th>
        <th>Studiengang</th>
        <th>Funktion(en)</th>
      </tr>
      <!-- //Einbindung der User -->
      @foreach ($modules->sortBy('name') as $module)
      <tr>
        <td> {{$module->name}} </td>
        @if($module->user != null)
        <td> {{$module->user->name}} </td>
        @else
          <td>kein User zugewiesen</td>
        @endif
        <td> {{$module->course->name}}</td>
        <td>
          <div class="button-center">
            <form method="POST" action="/admin/modules/{{$module->id}}">
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
    <p>Es wurden noch keine Module angelegt.</p>
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
</style>