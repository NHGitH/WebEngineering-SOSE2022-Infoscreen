<x-layout>
  <!-- Einbinden der Komponente _admin-header -->
  @include('_admin-header')

  <div class="px-6 py-8">
    <!-- Suchleiste -->
    <div class="filter">
      <form method="GET" action"#">
        <label for="post">Suche:</label><br>
        <input type="text" name="post" id="post" placeholder="Suchbegriff eintragen" value="{{request('post')}}">
      </form>
    </div>
    <!-- Einbinden Posteinträge -->
    @if ($posts->count())
    <table class="container-table">
      <tr class="styled-tr">
        <th>Author</th>
        <th>Titel</th>
        <th>Body</th>
        <th>Image</th>
        <th>Gepostet am:</th>
        <th>Funktion(en)</th>
      </tr>

      <!-- //Ausgabe der Posteinträge -->
      @foreach ($posts->sortBy('author.name') as $post)
      <tr>
        <td> {{$post->author->name}} </td>
        <td> {{$post->title}} </td>
        <td> {{$post->body}}</td>
        <td> <img src="/images/{{$post->picture_path}}" alt="/images/{{$post->picture_path}}" width="100px"
            height="100px"> </td>
        <td> {{$post->published_at}}</td>
        <td>
          <div>
            <!-- Form zum Löschen von Datenbankeinträgen -->
            <form class="button-center" method="POST" action="/admin/posts/{{$post->id}}">
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
    <p>Es wurden noch keine Posts verfasst.</p>
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