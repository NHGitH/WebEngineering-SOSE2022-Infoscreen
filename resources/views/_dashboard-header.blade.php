<header>
  <!-- NEUE NAVBAR -->
  <div class="nav-caption">
    <a href="/dashboard"><h1>Infoscreen<br />Hochschule Flensburg</h1></a>
  </div>

  <nav>
    <ul class="nav-links">
      <li><a href="/dashboard/posts">Meine Posts</a></li>
      <li><a href="/dashboard/lessons">Meine Veranstaltungen</a></li>
      <li><a href="/dashboard/news">Meine News</a></li>
      @if(auth()->user()->role == "admin")
      <li><a href="/admin">Mein Adminbereich</a></li>
      @endif
    </ul>
  </nav>

  <div class="nav-links">
    <li>Moin <strong>{{auth()->user()->name}}</strong>!</li>
  </div>

  <div class="nav-links">
    <li>
      <form method="POST" action="/logout">@csrf<button class="logout-button" type="submit">Logout</button></form>
    </li>
  </div>
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
</style>