<x-layout>
    @include('_admin-header')

    <div class="px-6 py-8">
        @if ($buildings->count())
        <table class="table">
            <tr>
                <th> Name </th> 
                <th> Erstellt am: </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach ($buildings as $building)
            <tr>
                <td> {{$building->name}} </td>
                <td> {{$building->created_at}} </td>
               
                <td>
                    <div>
                        <form method="POST" action="/dashboard/buildings/{{$building->id}}">
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