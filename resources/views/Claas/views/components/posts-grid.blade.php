@props(['posts'])

@if ($posts->count() > 1)

@foreach ($posts->skip(1) as $post)
<div class="lg:grid lg:grid-cols-6">
    <x-post-card :post="$post" class="{{ $loop->iteration <3 ? 'col-span-3' : 'col-span-2'}} " />
</div>
@endforeach

@endif