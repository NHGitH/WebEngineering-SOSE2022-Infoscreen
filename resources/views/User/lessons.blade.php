<x-layout>
    @include('_dashboard-header')

    <div class="px-6 py-8">
        @if (auth()->user()->modules->count())
        <table class="table">
            <tr>
                <th> Name </th>
                <th> Studiengang </th>
                <th> Modul </th>
                <th> Zeitpunkt: </th>
                <th> Funktionen </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach (auth()->user()->modules as $module)
            @foreach ($module->lessons as $lesson)
            <tr>
                <td> {{$module->name}} </td>
                <td> {{$module->course->name}} </td>
                <td></td>
                <!-- <td> {{$module->course->name}} </td> -->
                <td>
                    <div>
                        <a href="/dashboard/modules/{{$module->id}}/edit"> Bearbeiten </a>

                        <form method="POST" action="/dashboard/modules/{{$module->id}}">
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
        <p>Sie haben noch keine Posts verfasst.</p>
        @endif
    </div>
</x-layout>

<style>
    td, th, table {
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;
    }

    table {
        width: 100%;
    }
</style>