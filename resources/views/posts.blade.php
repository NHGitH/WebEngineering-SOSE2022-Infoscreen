<x-layout>
    @if ($posts->count())

    <div class="posts-container">
        @foreach ($posts->skip(1) as $post)
        <div class="post-card-container">
            <x-post-card :post="$post" />
        </div>
        @endforeach
    </div>

    @else
    <p class="text-center">No posts yet. Please check again later.</p>
    @endif

</x-layout>

<style>
    .posts-container {
        text-align: center;
        width: 100%;
        margin: 10px;
    }

    .post-card-container{
        padding: 5px;
        margin: 5px;
    }
</style>