<x-layout>
    @include('_dashboard-header')

    <div class="px-6 py-8">
        <main class="max-w-3xl mx-auto mt-10 lg:mt-10 space-y-6">
            @if (auth()->user()->modules->count())
            <table class="table">
                <tr>
                    <th> Modul </th>
                    <th> Studiengang </th>
                    <th> Gebäude </th>
                    <th> Raum </th>
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
                    <td> {{$lesson->room->name}}</td>
                    <td> {{$lesson->date}}</td>
                    <td> {{$lesson->time}}</td>
                    <!-- <td> {{$module->course->name}} </td> -->
                    <td>
                        <div class="functions">
                            <a href="/dashboard/lessons/{{$lesson->id}}/edit"> Bearbeiten </a>

                            <form method="POST" action="/dashboard/lessons/{{$lesson->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Entfernen</button>
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
        </main>
    </div>
</x-layout>

<style>

    .functions a{
        color:black;
    }

    .functions form button{
        color:black;
    }

    td,
    th,
    table {
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;
    }

    table {
        width: 100%;
    }

    p{
        text-align: center;
    }
</style>