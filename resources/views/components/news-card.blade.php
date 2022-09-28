@props(['post'])
<article>
    <div class="news_container">
        <div class="news-heading">
            <h1>{{$post->title}}</h1>
        </div>
        <div class="news-image">
            <img src="/images/{{$post->picture_path}}" alt="" width="200px" height="200px">
        </div>
        <div class="news-content">
            <p>Author: {{$post->author->name}}</p>
            <p>Veröffentlicht am: {{$post->published_at ? Carbon\Carbon::parse($post->published_at)->format('d-m-Y') : '-'}}</p>
        </div>
        <p class="news-body">{{$post->body}}</p>
    </div>
</article>

<style>
    .news-heading {
        text-align: center;
        grid-column-start: span 2;
        width: 100%;
    }

    .news-heading h1 {
        font-size: large;
        text-align: center;
    }

    .news_container {
        display: grid;
        grid-template-columns: 40% 60%;
        grid-template-rows: 5em 40%;
        height: 100%;
        min-width: 100px;
    }

    .news-image {
        width: 100%;
        height: 100%;
        grid-column-start: span 2;
    }

    .news-image img {
        object-fit: contain;
    }

    .news-content {
        grid-column-start: 1;
    }

    .news-content h1 {
        font-size: large;
    }

    .news-content p {
        font-size: small;
    }

    .news-body {
        grid-column-start: 2;
    }
</style>