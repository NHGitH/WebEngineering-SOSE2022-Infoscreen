<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($room->count())

        <div class="lg:grid lg:grid-cols-6">
            @foreach ($room->skip(1) as $room)
                <h1>{{$room->name}}</h1>
            @endforeach
        </div>

        @else
        <p class="text-center">No posts yet. Please check again later.</p>
        @endif
    </main>
</x-layout>