<x-layout>
    @include('_dashboard-header')

    <div class="px-6 py-8">
        @if (auth()->user()->posts->count())
        <table class="table">
            <tr>
                <th> Titel </th>
                <th> Body </th>
                <th> Image </th>
                <th> Gepostet am: </th>
                <th> Funktionen </th>
            </tr>
            <!-- //Einbindung der User -->
            @foreach (auth()->user()->posts as $post)
            <tr>
                <td> {{$post->title}} </td>
                <td> {{$post->body}}</td>
                <td> <img src="/images/{{$post->picture_path}}" alt="/images/{{$post->picture_path}}" width="100px" height="100px"> </td>
                <td> {{$post->published_at}}</td>
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