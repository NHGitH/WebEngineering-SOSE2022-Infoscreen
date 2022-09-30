<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-3xl mx-auto mt-10 lg:mt-10 space-y-6">
      <div class="wrap">
        @if ($buildings->count())
        <form class="wrap-2" method="GET" action"#">
          <select name="building">
            <option value="" disabled selected>Gebäude</option>
            @foreach($buildings as $building)
            <option value="{{$building->name}}">{{$building->name}}</option>
            @endforeach
          </select>
          <input type="text" name="search" id="search" placeholder="Raum auswählen" value="{{request('search')}}">
        </form>
        <x-choose-room :rooms="$rooms"></x-choose-room>
        @endif
      </div>
    </main>
  </section>
</x-layout>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-size: 100%;
}

.wrap {
  border: 2px solid #ddd;
  border-radius: 5px;
  padding: 30px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  width: 50%;
  margin: 0 auto;
  background-color: #1a2a36;
}

.wrap-2 {
  display: grid;
  grid-template-columns: 50% 50%;
  align-items: center;

  margin: 0 auto 10px auto;
  border: 2px solid #1a2a36;
  border-radius: 3px;
  text-align: center;
  background-color: #1a2a36;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.wrap-2 select {
  margin: 0 auto;
  width: 150px;
  height: 30px;
  color: #1a2a36;
}

.wrap-2 select option {
  color: #1a2a36;
}

.wrap-2 input {
  padding: 3px;
  margin: 8px;
}

summary {
  outline: none;
  padding: 1rem;
  display: block;
  background: #1a2a36;
  color: #fff;
  padding-left: 1rem;
  position: relative;
  cursor: pointer;
  margin-bottom: 20px;
  font-weight: bold;
}

summary:focus {
  border-color: black;
}

details {
  max-width: auto;
  box-sizing: border-box;
  margin-top: 0px;
  background-color: #DEDEDE;
}

details summary::-webkit-details-marker {
  display: none;
}

details[open]>summary:before {
  transform: rotate(90deg);
}

summary:before {
  content: '';
  border-width: .4rem;
  border-style: solid;
  border-color: transparent transparent transparent #fff;
  position: absolute;
  top: 1.3rem;
  right: 2rem;
  /*left: 1rem;*/
  transform: rotate(0);
  transform-origin: .2rem 50%;
  transition: 0.2s transform ease 0s;
}
</style>