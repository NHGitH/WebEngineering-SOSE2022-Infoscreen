<nav class="navbar">
        <!-- Navigationsmenü -->
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
        <ul class="nav-links">

            <div class="menu">
                <li><a href="/dashboard/posts">Posts</a></li>
                <li><a href="/dashboard/modules">Veranstaltungen</a></li>
                <li><a href="/dashboard/buildings">Gebäude</a></li>
                <li><a href="/dashboard/rooms">Räume</a></li>
                <li><a href="/dashboard/courses">Studiengänge</a></li>
                <li><a href="/dashboard/users">User</a></li>
            </div>

        </ul>
</nav>

<style>
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