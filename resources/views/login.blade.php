<x-layout>
  <div class="login-main-container">
    <div class="picture-container">
      <div class="login-container-neu">
        <div class="login-container-caption">
          <h1>Hochschule Flensburg</h1>
          <h1>Herzlich Willkommen</h1>
        </div>
        <div>
          <form method="POST" action="/login">
            @csrf
            <input type="text" name="username" placeholder="Username" required />

            <input type="password" name="password" placeholder="Password" required />
            <button type="submit"> Einloggen </button>

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

          <a href="#"> Screen starten </a>
        </div>

      </div>


    </div>
  </div>
  </div>
</x-layout>

<style>
  input[type=text] {
    padding: 5px;
    margin: 5px 0;
    box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
    border-radius: 5px;

  }

  li{
    color: red;
  }

  input[type=password] {
    padding: 5px;
    margin: 5px 0;
    box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
    border-radius: 5px;
  }

  input {
    width: 70%;
    font-family: inherit;
    font-size: inherit;
  }

  .login-container-neu {
    width: 15%;
    min-width: 200px;
    height: 50%;
    min-height: 300px;
    box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.165);
    background-color: rgba(204, 204, 204, 0.2);
    margin: 15% auto;
    border-radius: 10px;
    text-align: center;
  }

  .user-text-input,
  .user-password-input {
    border: 0;
    border-bottom: 1px solid #eee;
  }

  /*---------*/
  /*---------*/
  /* BUTTON */
  /*---------*/
  /*---------*/

  button {
    /* Behavior deaktivieren */
    appearance: none;
    -webkit-appearance: none;

    /* Styles */
    padding: 7px;
    margin: 20px 0;
    border: none;
    background-color: #3f51b576;
    color: #fff;
    font-weight: 600;
    border-radius: 5px;
    width: 50%;
  }

  ::placeholder {
    text-align: center;
  }

  /*---------*/
  /*---------*/
  /* H1 */
  /*---------*/
  /*---------*/

  .login-container-neu h1 {}

  .login-container-caption {
    text-align: center;
    font-weight: 200;
    padding: 10% 0 15% 0;
    color: white;
  }

  body {
    background-size: auto 100vh;
    background-image: url("/images/layered-waves-haikei.svg");
  }
</style>