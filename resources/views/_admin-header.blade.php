<header>
  <!-- NEUE NAVBAR -->
  <div class="nav-caption">
    <a href="/dashboard">
      <h1>Infoscreen<br />Hochschule Flensburg</h1>
    </a>
    <!--<img src="/public/images/Logo_der_Hochschule_Flensburg.png">-->
  </div>

  <nav>
    <ul class="nav-links">
      <li><a href="/admin/posts">Posts</a></li>
      <li><a href="/admin/news">News</a></li>
      <li><a href="/admin/modules">Module</a></li>
      <li><a href="/admin/buildings">Gebäude</a></li>
      <li><a href="/admin/rooms">Räume</a></li>
      <li><a href="/admin/courses">Studiengänge</a></li>
      <li><a href="/admin/users">User</a></li>
    </ul>
  </nav>

  <div class="nav-links">
    <li>Moin <strong>{{auth()->user()->name}}</strong>!</li>
  </div>

  <form method="POST" action="/logout">
    @csrf<button class="logout-button" type="submit">Logout</button>
  </form>


  <!-- -->

  <!-- NUR ZU TESTZWECKEN AUSKOMMENTIERT
  <nav class="navbar">
    <!-- Navigationsmenü -->
  <!--
    <ul class="nav-links">

      <div class="menu">
        <li><a href="/dashboard">Hochschule Flensburg</a></li>
        <li><a href="#">Angemeldet als: <strong>{{auth()->user()->name}}</strong></a></li>
        <li>
          <form method="POST" action="/logout">@csrf<button type="submit">Logout</button></form>
        </li>
      </div>

    </ul>
  </nav>
  <nav class="navbar">

    <!-- Navigationsmenü -->
  <!--
    <ul class="nav-links">

      <div class="menu">
        <li><a href="/dashboard/posts">Meine Posts</a></li>
        <li><a href="/dashboard/modules">Meine Veranstaltungen</a></li>
        @if(auth()->user()->role == 'admin')
        <li><a href="/admin">Meine Adminbereich</a></li>
        @endif
      </div>

    </ul>
  </nav> -->
</header>


<style>
li,
a,
button {
  font-size: 17px;
  color: #fff;
  text-decoration: none;
}

header {
  background-color: #1a2a36;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 30px 10%;
}

.nav-links {
  list-style: none;
}

.nav-links li {
  display: inline-block;
  padding: 0 20px;
}

.nav-links li a {
  transition: all 0.3s ease 0s;
}

.nav-links li a:hover {
  transition: all 0.3s ease 0s;
  color: #bec0c1;
}

.nav-caption h1 {
  font-size: 20px;
  font-weight: bold;
  color: #edf0f1;
}

nav a {
  text-decoration: none;
}

nav a li {
  list-style: none;
}

.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: teal;
  color: #fff;
}

.nav-links {
  color: #fff;
}

.menu {
  display: flex;
  gap: 1em;
  font-size: 18px;
}

.menu li:hover {
  background-color: #4c9e9e;
  border-radius: 5px;
  transition: 0.3s ease;
}

.menu li {
  padding: 5px 14px;
  align-self: center;
}

.logout-button {
  background-color: #919191;
  color: #edf0f1;
  width: 100px;
}
</style>