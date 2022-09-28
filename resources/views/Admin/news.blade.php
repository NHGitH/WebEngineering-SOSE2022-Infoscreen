<x-layout>
    @include('_admin-header')

    <div class="px-6 py-8">
        @if ($news->count())
        <table class="table">
            <tr>
                <th> Name </th>
                <th> Gebäude </th>
                <th> erstellt am: </th>
                <th> Funktionen </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach ($newslist as $news)
            <tr>
                <td> {{$news->post->title}} </td>
                <td> {{$news->room->name}} </td>
                <td> {{$news->lesson->name}} </td>


                <td>
                    <div>
                        <form method="POST" action="/admin/rooms/{{$room->id}}">
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
        <p>Sie haben noch keine News verlinkt.</p>
        @endif
    </div>
</x-layout>

<style>
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
</style>