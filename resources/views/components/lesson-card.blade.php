@props(['lesson'])
<section>
  <div class="container">
    <div class="text-area">
      <h2 class="text-2xl">{{$lesson->module->name}}</h2>
      <p class="text-sm"><strong>Raum:</strong> {{$lesson->room->name}}</p>
      <p class="text-sm"><strong>Professor:</strong> {{$lesson->module->user->name}}</p>
      <p class="text-sm"><strong>Studiengang:</strong> {{$lesson->module->course->name}}</p>
      <p class="text-sm"><strong>Datum:</strong>
        {{\Carbon\Carbon::createFromFormat('Y-m-d',$lesson->date)->format('d-m-Y')}}</p>
      <p class="text-sm"><strong>Uhrzeit:</strong>
        {{\Carbon\Carbon::createFromFormat('H:i:s',$lesson->time)->format('h:i')}}</p>
    </div>
    <div>
      @if($lesson->module->news != null)
      @foreach($lesson->module->news()->take(3)->get() as $new)
      <x-news-card :post="$new->post" />
      @endforeach
      @else
      <p>Es wurden keine Posts zu diesem Modul verlinkt.</p>
      @endif
    </div>
  </div>
</section>

<style>
.container {
  background-color: #eee;
  display: grid;
  grid-template-columns: 50% 50%;
  border-radius: 5px;
  width: 100%;
  box-shadow: rgba(0, 0, 0, 0.45) 0px 5px 15px;
  margin: 20px 0 0 0;
}

.text-area {
  display: grid;
  grid-template-rows: 100px repeat(5 30px);

  padding: 15px;
  color: #1a2a36;
}

.text-area h2 {
  text-align: center;
  margin: 10px 0;
  font-weight: bold;
}

.text-sm {
  font-size: 16px;
  margin: 5px 0;
  border: 75%;
  border-bottom: 1px solid black;
}

.text-sm:last-of-type {
  border: none;
}
</style>