@props(['post'])
<div class="card-container">
  <div class="posts-img">
    <img src="/images/{{$post->picture_path}}" alt="" width="500px" height="500px">
  </div>
  <div class="card-content">
    <h1><strong>{{$post->title}}</strong></h1>
    <p><strong>Author: </strong>{{$post->author->name}}</p>
    <p><strong>Veröffentlicht am:
      </strong>{{$post->published_at ? Carbon\Carbon::parse($post->published_at)->format('d-m-Y') : '-'}}
    </p>
    <p>{{$post->body}}</p>
  </div>
</div>

<style>
.posts-img {
  margin: 10px;
}

.posts-img img {
  object-fit: contain;
  height: 100%;
}

.card-container {
  display: grid;
  grid-template-columns: 20% 80%;
  border: 2px solid #DEDEDE;
}

.card-content {
  height: 100%;
  padding: 10px 20px;
  display: block;
  width: 100%;
  font-size: 100%;
}

.card-content h1 {
  font-size: 140%;
  margin-bottom: 10px;
}
</style>