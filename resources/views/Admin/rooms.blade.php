<x-layout>
    @include('_admin-header')

    <div class="px-6 py-8">
        @if ($rooms->count())
        <table class="table">
            <tr>
                <th> Name </th> 
                <th> slug </th>
                <th> Gebäude </th> 
                <th> erstellt am: </th>
                <th> Funktionen </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach ($rooms as $room)
            <tr>
                <td> {{$room->name}} </td>
                <td> {{$room->slug}} </td>
                <td> {{$room->building_id}} </td>
                <td> {{$room->created_at}} </td>
                
               
                <td>
                    <div>
                        <form method="POST" action="/dashboard/rooms/{{$room->id}}">
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