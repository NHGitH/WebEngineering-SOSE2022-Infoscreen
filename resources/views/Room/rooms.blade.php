<x-layout>
    <div class="wrap">
        <div>
            @if ($rooms->count())

            @foreach ($rooms as $room)
            <x-room-page :room="$room" />
            @endforeach

            @else
            <p class="text-center">No posts yet. Please check again later.</p>
            @endif
        </div>
    </div>
</x-layout>

<style>
    .wrap {
        display: block;
    }
</style>