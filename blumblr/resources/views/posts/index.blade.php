@extends ('layouts.app-card')



@section('cardcontent')
<!-- link referencing create function on PostController -->
<!-- <p class="text-center"><a href="/posts/create">Create a new Post</a></p> -->



<form class="" method="post" action="/posts">
    {{csrf_field()}}
    <div class="form-group text-center">
      <label for="postname">Create Post Title</label>
      <input type="text" id="postname" name="postname" placeholder="What do you want to call your post?" class="form-control input-lg text-center">
      <input type="text" id="postpost" name="postpost" placeholder="What do you want to post?" class="form-control input-lg text-center mt-3">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-success">Post it!</button>
    </div>
</form>


  @foreach($posts as $post)
  <div class="container d-flex justify-content-center mt-5">
    <div class="card text-center" style="width: 18rem;">
    <div class="card-body">
     <h5 class="card-title">{{$post->title}}</h5>
     <h6 class="card-subtitle mb-2 text-muted">{{$post->user_id}}</h6>
     <p class="card-text">{{$post->post}}</p>
     <a href="/posts/{{ $post->id }}/edit" class="card-link">Edit link</a>
     <a href="/posts/{{ $post->id }}/delete" class="card-link">Delete link</a>
    </div>
    </div>
  </div>
@endforeach



@endsection
