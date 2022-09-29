<x-layout>
    @include('_admin-header')

    <div class="px-6 py-8">
        @if ($newslist->count())
        <table class="table">
            <tr>
                <th> Postname </th>
                <th> Modul </th>
                <th> Raum </th>
                <th> Gebäude </th>
                <th> Funktionen </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach ($newslist as $news)
            <tr>
                @if($news->post != null)
                <td> {{$news->post->title}} </td>
                @else
                <td> kein Post zugewiesen </td>
                @endif
                @if($news->module != null)
                <td> {{$news->module->name}} </td>
                @else
                <td> kein Modul zugewiesen </td>
                @endif
                @if($news->room != null)
                <td> {{$news->room->name}} </td>
                @else
                <td> kein Raum zugewiesen </td>
                @endif
                @if($news->building != null)
                <td> {{$news->building->name}} </td>
                @else
                <td> kein Gebäude zugewiesen </td>
                @endif



                <td>
                    <form method="POST" action="/admin/news/{{$news->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Entfernen</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        @else
        <p>Es sind noch keine News verlinkt.</p>
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