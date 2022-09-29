@props(['post'])
<div class="news_container">
  <div class="news-heading">
    <h1>{{$post->title}}</h1>
  </div>
  <div class="news-image">
    <img src="/images/{{$post->picture_path}}" alt="">
  </div>
  <p class="news-body">{{$post->body}}</p>
</div>

<style>
.news_container {
  display: grid;
  grid-template-rows: 30% 30% 40%;
  height: 100%;
  min-width: 100px;
  color: #1a2a36;
  align-items: center;
  border-left: 1px solid #1a2a36;
}

.news-heading {
  text-align: center;
  width: 100%;
  padding: 10px;
}

.news-heading h1 {
  text-align: center;
  font-weight: bold;
  font-size: 1.2rem;
  vertical-align: middle;
}

.news-image {
  margin: 0 auto;
  padding: 10px;
}

.news-image img {
  object-fit: contain;
  margin: 0 auto;
  width: 100px;
  height: auto;
}

.news-body {
  text-align: justify;
  font-size: 14px;
  text-overflow: ellipsis;
  overflow: hidden;
  padding: 10px;
}
</style>