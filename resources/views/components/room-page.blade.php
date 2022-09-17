@props(['room'])
<section>
  <div class="head-container">
    <img class="hochschuleLogo" src="/images/Logo_der_Hochschule_Flensburg.png" width="150px">
    <h1 class="welcome">Willkommen im Raum {{$room->name}} des {{$room->building->name}}-Gebäudes</h1>
    <div class="clock">
      <h1 class="time">
        {{$now = date('H:i:s')}}</h1>
    </div>
  </div>

  <div class="main-container">
    <div class="module-card">
      @if ($room->modules()->count())
      @foreach ($room->modules()
      ->orderby('time','desc')
      ->take(3)
      ->get() as $module)
      <x-module_card :module="$module"/>
      @endforeach
      @else
      <p class="text-center">No modules yet. Please check again later.</p>
      @endif
    </div>
  </div>
</section>

<style>
  .head-container {
    width: 100%;
    display: grid;
    grid-template-columns: 20% 60% 20%;
    align-items: center;
    justify-items: center;
    border-bottom: 2px solid #D9D9D9;
    padding-bottom: 20px;
  }

  .main-container {
    width: 100%;
    display: grid;
    grid-template-columns: 30% 70%;
    align-items: center;
    justify-items: center;
    border-bottom: 2px solid #D9D9D9;
    padding-bottom: 20px;
  }

  .module-card {
    width: 100%;
    grid-column-start: 1;

  }

  .hochschuleLogo {
    grid-column-start: 1;
  }

  .time {
    font-size: x-large;
    text-align: center;
  }

  .welcome {
    font-size: x-large;
    text-align: center;
  }

  .clock {
    border: 2px solid #D9D9D9;
    border-radius: 10px;
    padding: 10px;
  }

</style>