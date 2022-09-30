<x-layout>
  @include('_dashboard-header')
  <div class="container-new-entry">
    <summary>Post anlegen:</summary>
    <form method="POST" action="/dashboard/posts/{{$post->id}}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="new-entry-div">

        <label for="title">ÜBERSCHRIFT:</label>
        <input type="text" name="title" id="title">

        <label for="image">BILD HOCHLADEN (nur png Dateien):</label>
        <input type="file" size="5000" accept="image/png" name="image" id="image">

        <label for="body">INHALT:</label>
        <textarea id="body" name="body" rows="4" cols="50" placeholder="{{$post->body}}"></textarea>

        <button class="add-button" type="submit">HINZUFÜGEN</button>
      </div>
    </form>
  </div>
</x-layout>

<style>
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

.add-button{
  color: black;
}
</style>