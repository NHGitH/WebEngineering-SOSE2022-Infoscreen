<x-layout>
  @include('_dashboard-header')
  <div class="container-new-entry">
    <summary>News bearbeiten:</summary>
        <form class="container-form-grid form-grid-gap-event" method="POST" action="/dashboard/news/{{$news->id}}">
          @csrf
          @method('PATCH')
          <div class="grid-item-label-and-input">
            <label for="post">Post:</label><br>
            <select name="post_id">
              @foreach(auth()->user()->posts->sortBy('name') as $post)
              <option value="{{$post->id}}">{{$post->title}}</option>
              @endforeach
            </select>
          </div>

          <div class="grid-item-label-and-input">
            <label for="module_id">Modul:</label><br>
            <select name="module_id">
              @foreach(auth()->user()->modules->sortBy('name') as $module)
              <option value="{{$module->id}}">{{$module->name}} | {{$module->course->name}}</option>
              @endforeach
            </select>
          </div>

          <button class="add-button" type="submit">News aktualisieren</button>

          @if($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
          @endif
        </form>
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
</style>