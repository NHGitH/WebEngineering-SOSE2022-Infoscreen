<x-layout>
    <div>
        @if ($buildings->count())

        @foreach ($buildings as $building)
            <x-building-card :building="$building"/>
        @endforeach

        @else
        <p class="text-center">No posts yet. Please check again later.</p>
        @endif
    </div>
</x-layout>