@extends ('layouts.app')



@section('content')
<p class="text-center"><a href="/posts/create">Create a new Post</a></p>


  @foreach($posts as $post)
  <div class="container d-flex justify-content-center mt-5">
    <div class="card text-center" style="width: 18rem;">
    <div class="card-body">
     <h5 class="card-title">{{$post->title}}</h5>
     <h6 class="card-subtitle mb-2 text-muted">{{$post->user_id}}</h6>
     <p class="card-text">{{$post->post}}</p>
     <a href="#" class="card-link">Edit link</a>
     <a href="#" class="card-link">Delete link</a>
    </div>
    </div>
  </div>
@endforeach



@endsection
