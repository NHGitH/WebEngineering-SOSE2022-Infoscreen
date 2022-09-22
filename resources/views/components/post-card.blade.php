@props(['post'])
<article>
    <div class="card_container">
    <img src="/images/{{$post->picture_path}}" alt="/images/{{$post->picture_path}}" width="500px" height="500px">
        <div class="card-content">
            <h1>{{$post->title}}</h1>
            <p>Author: {{$post->author->name}}</p>
            <p>Veröffentlicht am: {{$post->published_at}}</p>
            <p>{{$post->body}}</p>
        </div>
    </div>
</article>

<style>
    img{
        object-fit: contain;
        height: 100%;
    }
    .card_container {
        display:grid;
        grid-template-columns: 20% 80%;
        border: 2px solid #DEDEDE;
    }

    .card-content{
        height: 100%;
        padding: 10px;
        display:block;
        width: 100%;
        grid-column-start: 2;
    }

    h1{
        font-size: 1.5vw;
    }
    p{
        font-size: 1vw;
    }
</style>