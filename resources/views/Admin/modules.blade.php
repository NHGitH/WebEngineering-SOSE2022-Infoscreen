<x-layout>
    @include('_admin-header')

    <div class="px-6 py-8">
        @if ($modules->count())
        <table class="table">
            <tr>
                <th> Name </th>
                <th> Professor </th>
                <th> Studiengang </th>
                <th> Funktionen </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach ($modules as $module)
            <tr>
                <td> {{$module->name}} </td>
                <td> {{$module->user->name}} </td>
                <td> {{$module->course->name}}</td>
                <td>
                    <div>
                        <form method="POST" action="/admin/modules/{{$module->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Entfernen</button>
                        </form>
                    </div>
                </td>
            </tr>
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