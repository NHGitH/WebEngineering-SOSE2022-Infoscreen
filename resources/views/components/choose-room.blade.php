@props(['rooms'])
<div class="choose-room-main-container">
  <h1>Liste aller Räume:</h1>
  @if($rooms->count())
  @foreach($rooms->sortBy('building_id') as $room)
  <div class="choose-room-room-container">
    <a href="/buildings/{{$room->building->name}}/{{$room->name}}">{{$room->building->name}}:{{$room->name}}</a>
  </div>
  @endforeach
  @else
  <p>Der Raum, nach dem Sie suchen, existiert nicht.</p>
  @endif
</div>

<style>
* {
  color: #fff;
}

.choose-room-main-container {
  display: block;
  padding: 10px;
  font-size: 20px;
  border: 2px solid #efefef;
  border-radius: 5px;
  margin: 0 auto;
  background-color: #1a2a36;
}

.choose-room-main-container h1 {
  text-align: center;
  border-bottom: 2px solid #efefef;
  margin-bottom: 10px;
}

.choose-room-room-container a {
  display: block;
  text-align: center;
  font-size: 90%;
  border: 1px solid white;
  width: 80%;
  margin: 0 auto 5px auto;
  background-color: #efefef;
  color: #1a2a36;
  transition: 0.2s ease 0s;
}

.choose-room-room-container a:hover {
  background-color: #aaa;
  transition: 0.2s ease 0s;
}

p {
  color: red;
}
</style>