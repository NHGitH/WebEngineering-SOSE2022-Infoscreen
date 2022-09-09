<x-layout>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($modules->count())

        <div class="">
            @foreach ($modules as $module)
                <x-module_card :module="$module"/>
            @endforeach
        </div>

        @else
        <p class="text-center">No posts yet. Please check again later.</p>
        @endif
    </main>

</x-layout>