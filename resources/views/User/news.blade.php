<x-layout>
  @include('_dashboard-header')

  <div class="px-6 py-8">
    @if ($newslist->count())
    <table class="container-table">
      <tr>
        <th> Postname </th>
        <th> Modul </th>
        <th> Gebäude </th>
        <th> Funktionen </th>
      </tr>
      <!-- //Einbindung der User -->
      @foreach ($newslist as $news)
      <tr>
        @if($news->post != null)
        <td> {{$news->post->title}} </td>
        @else
        <td> kein Post zugewiesen </td>
        @endif
        @if($news->module != null)
        <td> {{$news->module->name}} </td>
        @else
        <td> kein Modul zugewiesen </td>
        @endif
        @if($news->building != null)
        <td> {{$news->building->name}} </td>
        @else
        <td> kein Gebäude zugewiesen </td>
        @endif
        <td>
          <div>
            <a href="/dashboard/news/{{$news->id}}/edit">Bearbeiten</a>
            <form class="button-center" method="POST" action="/dashboard/news/{{$news->id}}">
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
    <p>Sie haben noch keine News verlinkt.</p>
    @endif
  </div>
</x-layout>

<style>
  .functions {
    display: flex;
  }

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
    width: 70%;
    text-align: center;
  }

  .styled-tr {
    background-color: #1a2a36;
    color: #fff;
    text-align: center;
  }

  /* Zeigt jede 2. Reihe in der Hintergrundfarbe #eee ==> bessere Unterscheidung */
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
    color: #fff;
  }

  .delete-button:hover {
    background-color: #313f4a;
    transition: 0.2 ease 0s;
  }

  .button-center {
    text-align: center;
  }
</style>