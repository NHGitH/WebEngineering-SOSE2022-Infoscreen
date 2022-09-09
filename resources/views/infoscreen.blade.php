<x-layout>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($modules->count())

        <div class="card-container">
            <div class="x-module_card">
                @foreach ($modules as $module)
                <x-module_card :module="$module" class="row-start-1" />
                @endforeach
            </div>
        </div>

        @else
        <p class="text-center">No posts yet. Please check again later.</p>
        @endif
    </main>

</x-layout>

<style>

</style>