<x-layout>
    @include ('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        <x-post-featured-card :post="$posts[0]" />

        @if ($posts->count())

        <div class="lg:grid lg:grid-cols-6">
            @foreach ($posts->skip(1) as $post)
                <x-post-card :post="$post" class="{{ $loop->iteration <3 ? 'col-span-3' : 'col-span-2'}}"/>
            @endforeach
        </div>

        @else
        <p class="text-center">No posts yet. Please check again later.</p>
        @endif
    </main>

</x-layout>