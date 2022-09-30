@props(['room'])
<section>
  <div class="head-container">
    <!--<img class="hochschuleLogo" src="/images/Logo_der_Hochschule_Flensburg.png" width="150px">-->
    <h1 class="infoscreen-caption">Infoscreen<br>Hochschule Flensburg</h1>
    <h1 class="welcome">Willkommen im <strong class="caption-different-color">Raum {{$room->name}}</strong> des
      <strong class="caption-different-color">{{$room->building->name}}-Gebäudes</strong>
    </h1>
    <div class="clock">
      <h1 class="time">
        {{$now = date('H:i')}}
      </h1>
    </div>
  </div>

  <div id="id4eb90f38d97d6" a='{"t":"g7bs","v":"1.2","lang":"de","locs":[1719],"ssot":"c","sics":"ds","cbkg":"rgba(255,255,255,0)","cfnt":"rgb(0,0,0)","cend":"rgba(0,0,0,0)"}'>
    Wetterdatenquelle: <a href="https://wetterlabs.de/wetter_flensburg/heute/">wettervorhersage heute Flensburg</a>
  </div>
  <script async src="https://static1.wetterlabs.de/widgetjs/?id=id4eb90f38d97d6"></script>

  <div class="main-container">
    <div class="module-card">
      <!--Erstellt eine Collection für Lessons, welche an dem jeweiligen Tag in dem Raum stattfinden. 
          Uhrzeit in der Zukunft! Sortiert nach der Zeit!
          Von dieser Collection werden die nächsten vier Lessons genommen und and die Componente Lesson-card weitergegeben.
          Wenn keine Lessons vorhanden sind, soll ausgegeben werden, dass noch keine Lessons für heute eingetragen sind.-->

      @if($room->lessons()->count())
      @foreach ($room->lessons()
      ->where('date', '=', date('Y-m-d'))
      ->where('time', '>=', $now)
      ->orderby('time','asc')
      ->take(4)
      ->get() as $lesson)
      <x-lesson-card :lesson="$lesson" />
      @endforeach
      @else
      <a class="twitter-timeline" data-width="500" data-height="800" data-tweet-limit="2" data-chrome="nofooter noheader noscrollbar" href="https://twitter.com/HochschuleFL?ref_src=twsrc%5Etfw">Tweets by HochschuleFL</a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      @endif
    </div>
    <div class="posts-container">
      @if ($room->building->news()->count())
      @foreach ($room->building->news->take(5) as $news)
      <x-post-card :post="$news->post" />
      @endforeach
      @else
      <p class="text-center">Zu diesem Gebäude wurden keine Neuigkeitenverlinkt.</p>
      @endif
    </div>
  </div>
  <div>
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

  .head-container h1 {
    font-size: 30px;
  }

  .main-container {
    width: 100%;
    display: grid;
    grid-template-columns: 30% 70%;
    align-items: center;
    justify-items: center;
    border-bottom: 2px solid #D9D9D9;
    color: #1a2a36;
    margin-top: 10px;
  }

  .posts-container {
    width: 95%;
    display: block;
    align-items: center;
    justify-items: center;
    border-radius: 5px;
    background-color: #fefefe;
    box-shadow: rgba(0, 0, 0, 0.45) 0px 5px 15px;
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

  .caption-different-color {
    color: goldenrod;
  }
</style>