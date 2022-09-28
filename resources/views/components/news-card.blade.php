@props(['post'])
<article>
  <div class="news_container">
    <div class="news-heading">
      <h1>{{$post->title}}</h1>
    </div>
    <div class="news-image">
      <img src="/images/{{$post->picture_path}}" alt="">
    </div>
    <div class="news-content">
      <p>Author: {{$post->author->name}}</p>
      <p>Veröffentlicht am: {{$post->published_at ? Carbon\Carbon::parse($post->published_at)->format('d-m-Y') : '-'}}
      </p>
    </div>
    <p class="news-body">{{$post->body}}</p>
  </div>
</article>

<style>
.news_container {
  display: grid;
  grid-template-columns: 50% 50%;
  grid-template-rows: 5em 40%;
  height: 100%;
  min-width: 100px;
  color: #1a2a36;
}

.news-heading {
  text-align: center;
  grid-column-start: span 2;
  width: 100%;
}

.news-heading h1 {
  text-align: center;
  margin: 10px 0;
  font-weight: bold;
}

.news-image {
  grid-column-start: 1;
  grid-column-end: 3;
  grid-row-start: 1;
  grid-row-start: 2;

  width: 200px;
  height: auto;
  margin: 0 0 0 45px;
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