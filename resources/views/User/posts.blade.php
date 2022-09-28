<x-layout>
  @include('_dashboard-header')

  <div class="px-6 py-8">
    @if (auth()->user()->posts->count())
    <table class="container-table">
      <tr>
        <th>Titel</th>
        <th>Body</th>
        <th>Image</th>
        <th>Gepostet am:</th>
        <th>Funktionen</th>
      </tr>
      <!-- //Einbindung der User -->
      @foreach (auth()->user()->posts as $post)
      <tr>
        <td> {{$post->title}} </td>
        <td> {{$post->body}}</td>
        <td> <img src="/images/{{$post->picture_path}}" alt="/images/{{$post->picture_path}}" width="100px"
            height="100px"> </td>
        <td> {{$post->published_at}}</td>
        <td>
          <div class="functions">
            <a class="edit-a" href="/dashboard/posts/{{$post->id}}/edit"> Bearbeiten </a>

            <form class="button-center" method="POST" action="/dashboard/posts/{{$post->id}}">
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
    <p>Sie haben noch keine Posts verfasst.</p>
    @endif
  </div>
</x-layout>

<style>

.functions{
  display: flex;
}

td,
th,
table {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px;
}

.edit-a{
  background-color: #919191;
  text-align: center;
  border-radius: 2px;
  padding: 5px;
  font-size: 15px;
  margin: 0 auto;
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
</style>