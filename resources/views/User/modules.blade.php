<x-layout>
    @include('_dashboard-header')

    <div class="px-6 py-8">
        @if (auth()->user()->modules->count())
        <table class="table">
            <tr>
                <th> Name </th>
                <th> Body </th>
                <th> Image </th>
                <th> Gepostet am: </th>
                <th> Funktionen </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach (auth()->user()->modules as $module)
            <tr>
                <td> {{$module->name}} </td>
                <td> {{$module->room}}</td>
                <td> {{$module->room->building}}</td>
                <td>
                    <div>
                        <a href="/dashboard/posts/{{$post->id}}/edit"> Bearbeiten </a>

                        <form method="POST" action="/dashboard/posts/{{$post->id}}">
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
    td {
        text-align: center;
    }

    table {
        width: 100%;
    }
</style>