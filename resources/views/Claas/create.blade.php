<x-layout>


  <section class="register-form">
    <form method="POST" action="/register">
      @csrf
      <div class="form-item">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" id="name" value="{{old('name')}}" required>
        @error('name')
        <p>{{$message}}</p>
        @enderror
      </div>

      <div class="form-item">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" id="username" value="{{old('username')}}" required>
        @error('username')
        <p>{{$message}}</p>
        @enderror
      </div>

      <div class="form-item">
        <label for="role">Rolle:</label>
        <select id="role" name="role" required>
          <option value="guest" selected> Gast </option>
          <option value="prof"> Professor </option>
          <option value="admin"> Admin </option>
        </select>
        @error('role')
        <p>{{$message}}</p>
        @enderror
      </div>

      <div class="form-item">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" id="password" required>
        @error('password')
        <p>{{$message}}</p>
        @enderror
      </div>
      <div class="form-item">
        <button type="submit">Submit</button>
      </div>

      @if($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
    </form>
  </section>

  <section class="grid-container">
    <div class="grid-item grid-item-label-and-input">
      <form>
        <label for="personalName">NAME</label><br />
        <input type="text" id="personalName" required>
      </form>
    </div>

    <div class="grid-item grid-item-label-and-input margin-right">
      <form>
        <label for="userName">USERNAME</label><br />
        <input type="text" id="userName" required>
      </form>
    </div>

    <div class="grid-item grid-item-label-and-input">
      <form>
        <label for="role">ROLLE</label><br />
        <!--<input type="text" id="userName" required>-->

        <select id="role" name "role" required>
          <option value="guest" selected>Gast</option>
          <option value="prof">Professor</option>
          <option value="admin">Admin</option>
        </select>

      </form>
    </div>

    <div class="grid-item grid-item-label-and-input margin-right">
      <form>
        <label for="password">PASSWORT</label><br />
        <input type="password" id="password" required>
      </form>
    </div>

    <div class="grid-item grid-item-button">
      <button type="button">REGISTRIEREN</button>
    </div>
  </section>


</x-layout>

<style>
/*
.register-form {
  display: block;
  border-radius: 10px;
  border: 2px solid #DEDEDE;
  margin: 10%;
  padding: 20px;
}

.form-item {
  border: 2px solid #DEDEDE;
  border-radius: 10px;
  padding: 10px;
  margin: 20px;
}

input {
  border: 2px solid #DEDEDE;
}

p {
  color: red;
}
*/

* {
  padding: 0;
  margin: 0;
}

body {
  background-size: auto 100vh;
  background-image: url("/images/layered-waves-haikei.svg");
}

.grid-container {
  right: 50%;
  bottom: 50%;
  position: absolute;
  transform: translate(50%, 50%);

  padding: 0 10px;
  background-color: rgba(232, 232, 232, 0.7);

  display: grid;
  grid-template-columns: 2fr 2fr;
  grid-template-rows: 2fr 2fr 2fr;
  grid-column-gap: 25px;
}

.grid-item-label-and-input {
  margin: 30px 0 0 10px;
}

.margin-right {
  margin-right: 15px;
}

.grid-item-label-and-input label {
  font-size: 70%;
}

.grid-item-button button {
  background-color: #313131;
  color: #fff;
  border: none;
  padding: 10px 25px;
  margin: 0 auto;
  transition: 0.2s;

  position: absolute;
  top: 90%;
  right: 34%;
}

.grid-item-button button:hover {
  background-color: #616161;
  transition: 0.2s;
}

input {
  border: none;
  height: 20px;
}

select {
  width: 187.532px;
}
</style>