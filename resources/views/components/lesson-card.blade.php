@props(['lesson'])
<div class="container">
  <div class="text-area">
    <div class="background-caption">
      <h2>{{$lesson->module->name}}</h2>
    </div>
    <p class="text-sm"><strong>Raum:</strong> {{$lesson->room->name}}</p>
    <p class="text-sm"><strong>Professor:</strong> {{$lesson->module->user->name}}</p>
    <p class="text-sm"><strong>Studiengang:</strong> {{$lesson->module->course->name}}</p>
    <p class="text-sm"><strong>Datum:</strong>
      {{\Carbon\Carbon::createFromFormat('Y-m-d',$lesson->date)->format('d-m-Y')}}
    </p>
    <p class="text-sm"><strong>Uhrzeit:</strong>
      {{\Carbon\Carbon::createFromFormat('H:i:s',$lesson->time)->format('H:i')}}
    </p>
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

<style>
.container {
  background-color: rgb(243 244 246);
  display: grid;
  grid-template-columns: 50% 50%;
  border-radius: 5px;
  width: 100%;
  box-shadow: rgba(0, 0, 0, 0.45) 0px 5px 15px;
  margin: 10px 0 20px 0;
}

.text-area {
  display: grid;
  grid-template-rows: 20% repeat(5 16%);
  align-items: center;
  width: 100%;
}

.text-area h2 {
  text-align: center;
  font-weight: bold;
  font-size: 20px;
  color: #1a2a36;
}

.text-sm {
  font-size: 14px;
  margin: 5px 0;
  border: 75%;
  padding: 10px;
}

.text-sm:last-of-type {
  border: none;
}
</style>