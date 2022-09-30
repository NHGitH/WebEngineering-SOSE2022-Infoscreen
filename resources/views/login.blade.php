<x-layout>
  <!-- <div class="login-main-container">
    <div class="login-container-neu">
      <div class="login-container-caption">
        <h1>Infoscreen</h1>
        <h1>Hochschule Flensburg</h1>
      </div>
      <div>
        <form method="POST" action="/login">
          @csrf
          <input type="text" name="username" placeholder="Username" required />

          <input type="password" name="password" placeholder="Password" required />
          <button type="submit">Einloggen</button>

          @if($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
          @endif
        </form>
        <hr>
        <hr>

        <a href="/dashboard"> Screen starten </a>
      </div>
    </div>
  </div> -->
    <form method="POST" action="/login">
      @csrf
      <div class="grid-container">
        <div class="grid-item-1">
          <h1>Infoscreen<br />Hochschule Flensburg</h1>
        </div>

        <div>
          <!-- DUMMY DIV --- NICHT ENTFERNEN -->
          <!--<hr class="hr-margin-first">-->
        </div>

        <div class="grid-item-2">
          <label for="username">BENUTZER</label><br />
          <input type="text" name="username" id="username" required>
        </div>

        <div class="grid-item-3">
          <label for="password">PASSWORT</label><br />
          <input type="password" name="password" id="password" required>
        </div>

        <div class="grid-item-4 login-button">
          <button type="submit">EINLOGGEN</button>
        </div>

        <div>
          <hr class="hr-margin-second">
        </div>

        <div>
          @if($errors->any())
          @foreach ($errors->all() as $error)
          <p>{{$error}}</p>
          @endforeach
          @endif
        </div>

        <div class="grid-item-5">
          <a href="/rooms"><button type="button">RAUMÜBERSICHT</button></a>
        </div>
    </form>
</x-layout>

<style>

  body {
    background-size: auto 100vh;
    background-image: url("/images/layered-waves-haikei.svg");
  }

  * {
    padding: 0;
    margin: 0;
  }

  .grid-container {
    right: 50%;
    bottom: 50%;
    position: absolute;
    transform: translate(50%, 30%);
    background-color: rgba(232, 232, 232, 0.6);
    min-width: 290px;

    display: grid;
    grid-template-rows: 110px 18px 55px 55px 55px 18px 35px;

  }

  .grid-item-1 h1 {
    font-size: 150%;
    font-weight: bold;
    text-align: center;
    margin: 15px 15px 0 15px;
  }

  .grid-item-2,
  .grid-item-3 {
    margin: 0 auto;
    padding: 0;
  }

  .grid-item-2 label,
  .grid-item-3 label {
    font-size: 80%;
  }

  .grid-item-4 button {
    background-color: #313131;
    color: #fff;
    border: none;
    padding: 5px 15px;
    font-size: 70%;
    transition: 0.2s ease 0s;
    margin: 15px auto 0 auto;
  }

  .grid-item-5 button {
    background-color: #313131;
    color: #fff;
    border: none;
    padding: 10px 25px;
    margin: 0 auto;
    font-size: 90%;
    transition: 0.2s;

    position: absolute;
    top: 95%;
    right: 22%;
  }

  .login-button {
    height: 28px;
    margin: 0 auto;
  }

  .grid-item-4 button:hover,
  .grid-item-5 button:hover {
    background-color: #616161;
    transition: 0.2s;
  }

  hr {
    width: 75%;
    background-color: black;
  }

  .hr-margin-first {
    margin: 0 auto;
  }

  .hr-margin-second {
    margin: 0 auto 0 auto;
  }

  input {
    border: none;
    height: 20px;
  }
</style>