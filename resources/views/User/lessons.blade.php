<x-layout>
    @include('_dashboard-header')

    <div class="px-6 py-8">
        @if (auth()->user()->modules->count())
        <table class="container-table">
            <tr class="styled-tr">
                <th> Modul </th>
                <th> Studiengang </th>
                <th> Gebäude </th>
                <th> Datum </th>
                <th> Zeitpunkt: </th>
                <th> Funktionen </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach (auth()->user()->modules as $module)
            @foreach ($module->lessons->sortBy('date') as $lesson)
            <tr>
                <td> {{$module->name}} </td>
                <td> {{$module->course->name}} </td>
                <td> {{$lesson->room->building->name}}</td>
                <td> {{$lesson->date}}</td>
                <td> {{$lesson->time}}</td>
                <td>
                    <div class="functions">
                        <a class="edit-a" href="/dashboard/lessons/{{$lesson->id}}/edit"> Bearbeiten </a>

                        <form method="POST" action="/dashboard/lessons/{{$lesson->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button" type="submit">Entfernen</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @endforeach
        </table>
        @else
        <p>Sie sind keinen Modulen zugewiesen.</p>
        @endif
    </div>
</x-layout>

<style>
    .functions {
        display: flex;
    }

    td,
    th,
    table {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
    }

    .edit-a {
        background-color: #919191;
        text-align: center;
        border-radius: 2px;
        padding: 5px;
        font-size: 15px;
        margin: 0 auto;
    }

    .edit-a:hover {
        background-color: #313f4a;
        transition: 0.2 ease 0s;
    }

    .container-table {
        border-collapse: collapse;
        margin: 25px auto;
        font-size: 0.9rem;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        width: 50%;
        text-align: center;
    }

    .styled-tr {
        background-color: #1a2a36;
        color: #fff;
        text-align: center;
    }

    tr:nth-of-type(even) {
        background-color: #eee;
    }

    .delete-button {
        background-color: #919191;
        text-align: center;
        border-radius: 2px;
        padding: 5px;
        font-size: 15px;
        margin: 0 auto;
    }

    .delete-button:hover {
        background-color: #313f4a;
        transition: 0.2 ease 0s;
    }

    .button-center {
        text-align: center;
    }
</style>