@extends ('layouts.app-card2')

@section ('cardheader')
Edit Post
@endsection

@section('cardguts')



<form class="" method="post" action="/posts/{{ $post->id }}">
    @method('PUT')
    @csrf
    <div class="form-group text-center">
      <label for="postname">Create Post Title</label>
      <input type="text" id="postname" name="postname" value="{{ $post->title }}" class="form-control input-lg text-center">
      <input type="text" id="postpost" name="postpost" value="{{ $post->post }}" class="form-control input-lg text-center mt-3">
    </div>
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="text-center">
      <button type="submit" class="btn btn-success">Edit it!</button>
    </div>
</form>

@endsection
