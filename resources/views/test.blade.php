<x-layout>
    <div class="edit_area">
        Editables:
        <h3> Deine: </h3>
        <ul>
            <li> <a href="#User"> User </a> </li>
            <li> <a href="#Room"> Räume </a> </li>
            <li> <a href="#Prof"> Professoren </a> </li>
            <li> <a href="#Modul"> Module </a> </li>
            <li> <a href="#Kurs"> Kurse</a> </li>
            <li> <a href="#Gebaude"> Gebäude </a> </li>
        </ul>

        <hr>
        <!-- //
        //Möglicherweise fehlt ein ":" vor jedem value von jedem input type="text"-Feld
        //

        //
        //Funktioniert die Logik mit dem Präfix vor dem jeweiligen Feld nicht, so muss für jede Table eine .blade.php angesprochen werden
        //


        //
        //Als Zusatz das alte Benutzerbild des Professors darstellen lassen
        // -->

        <form method="post">
            @csrf
            @method('PATCH')

            <hr>
            <h2 id="User"> Benutzer bearbeiten </h2>
            @if ($users->count())
            <table class="table"> //Usertable
                <tr>
                    <th> Username </th>
                    <th> Name </th>
                    <th> Rolle </th>
                    <th> Angemeldet seit: </th>
                    <th> Funktionen </th>
                </tr>
                <!-- //Einbindung der User -->
                @foreach ($users as $user)
                <tr>
                    <td> <input name="user_username" type="text" value="{{$user->username}}" /> </td>
                    <td> <input name="user_name" type="text" value="{{$user->name}}" /> </td>
                    <td> <input name="user_role" type="text" value="{{$user->role}}" /> </td>
                    <td> <input name="user_created_at" type="text" value="{{$user->created_at}}" /> </td>
                    <td>
                    <div>
                            <a href="dashboard/{{auth()->user()->username}}/{{$user->id}}/edit/user"> Bearbeiten </a>

                            <form method="post" action="dashboard/{{auth()->user()->username}}/{{$user->id}}/delete/user">
                                @method=('DELETE')
                                <input type="submit" value="Entfernen" />
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            @endif
        </form>
    </div>
</x-layout>