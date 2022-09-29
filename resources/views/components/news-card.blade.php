@props(['post'])
<div class="news-container">
  <div class="news-heading">
    <h1>{{$post->title}}</h1>
  </div>
  <div class="news-image">
    <img src="/images/{{$post->picture_path}}" alt="">
  </div>
  <p class="news-body">{{$post->body}}</p>
</div>

<style>
.news-container {
  display: grid;
  grid-template-rows: 20% 40% 40%;
  align-items: center;
  border-left: 1px solid #1a2a36;
  height: 100%;
  min-width: 100px;
}

.news-heading {
  text-align: center;
  padding: 10px;
}

.news-heading h1 {
  text-align: center;
  font-weight: bold;
  font-size: 17px;
}

.news-image {
  width: 100px;
  height: auto;
  margin: 0 auto;
  padding: 10px;
}

.news-image img {
  object-fit: contain;
}

.news-body {
  color: black;
  width: auto;
  padding: 10px;
  margin: 0 auto;
  font-size: 13px;
}
</style>