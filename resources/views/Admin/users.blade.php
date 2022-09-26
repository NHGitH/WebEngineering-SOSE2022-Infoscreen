<x-layout>
    @include('_admin-header')

    <div class="px-6 py-8">
        @if ($users->count())
        <table class="table">
            <tr>
                <th> Username </th> 
                <th> Name </th>
                <th> Rolle </th>
                <th> erstellt am:  </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach ($users as $user)
            <tr>
                <td> {{$user->username}} </td>
                <td> {{$user->name}} </td>
                <td> {{$user->role}} </td>
                <td> {{$user->created_at}} </td>
                
               
                <td>
                    <div>
                        <form method="POST" action="/admin/users/{{$user->id}}">
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