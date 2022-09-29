@props(['room'])
<section>
  <div class="head-container">
    <!--<img class="hochschuleLogo" src="/images/Logo_der_Hochschule_Flensburg.png" width="150px">-->
    <h1 class="infoscreen-caption">Infoscreen<br>Hochschule Flensburg</h1>
    <h1 class="welcome">Willkommen im <strong class="different-color-caption">Raum{{$room->name}}</strong> des
      <strong class="different-color-caption">{{$room->building->name}}-Gebäudes</strong>
    </h1>
    <div class="clock">
      <h1 class="time">
        {{$now = date('H:i')}}
      </h1>
    </div>
  </div>

  <div class="main-container">
    <div class="module-card">
      <!--Erstellt eine Collection für Lessons, welche an dem jeweiligen Tag in dem Raum stattfinden. 
          Uhrzeit in der Zukunft! Sortiert nach der Zeit!
          Von dieser Collection werden die nächsten vier Lessons genommen und and die Componente Lesson-card weitergegeben.
          Wenn keine Lessons vorhanden sind, soll ausgegeben werden, dass noch keine Lessons für heute eingetragen sind.-->
      @if ($room->lessons()->count())
      @foreach ($room->lessons()
      ->where('date', '=', date('Y-m-d'))
      ->where('time', '>=', $now)
      ->orderby('time','asc')
      ->take(4)
      ->get() as $lesson)
      <x-lesson-card :lesson="$lesson" />
      @endforeach
      @else
      <p class="text-center">Für heute sind noch keine Veranstaltungen eingetragen.</p>
      @endif
    </div>
    <div class="posts-container">
      @if ($room->building->news()->count())
      @foreach ($room->building->news as $news)
      <x-post-card :post="$news->post"/>
      @endforeach
      @else
      <p class="text-center">No Posts yet. Please check again later.</p>
      @endif
    </div>
  </div>
</section>

<style>
* {
  margin: 0;
  padding: 0;
}

.head-container {
  width: 100%;
  display: grid;
  grid-template-columns: 30% 40% 30%;
  align-items: center;
  justify-items: center;
  border-bottom: 2px solid #D9D9D9;
  background-color: #1a2a36;
  padding: 10px 0;
  color: #efefef;
}

.posts-container {
  width: 90%;
  display: block;
  grid-column-start: 2;
  align-items: center;
  justify-items: center;
  padding: 10px;
}

.main-container {
  width: 100%;
  display: grid;
  grid-template-columns: 30% 70%;
  align-items: center;
  justify-items: center;
  border-bottom: 2px solid #D9D9D9;
}

.caption-lessons {
  grid-column-start: 1;
  grid-row-start: 1;
}

.caption-events-and-posts {
  grid-column-start: 2;
  grid-row-start: 1;
}

.module-card {
  width: 90%;
  grid-column-start: 1;
}

.infoscreen-caption {
  font-weight: bold;
}

.time {
  font-size: x-large;
  text-align: center;
}

.welcome {
  font-size: x-large;
  text-align: center;
  border-top: 3px solid #D9D9D9;
  border-bottom: 3px solid #D9D9D9;
  padding: 10px 0;
  letter-spacing: 1px;
}

.clock {
  border-top: 3px solid #D9D9D9;
  border-bottom: 3px solid #D9D9D9;
  padding: 10px 15px;
  letter-spacing: 3px;
  font-weight: bold;
  color: goldenrod;
}
.different-color-caption {
  color: goldenrod;
}
</style>