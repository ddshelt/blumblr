@extends ('layouts.app-card2')

@section ('cardheader')
    Delete a post
@endsection



@section('cardguts')

<form class="" method="post" action="/posts/{{ $post->id }}">
    @method('DELETE')
    @csrf
    <div class="form-group text-center">
      <label for="postname">Create Post Title</label>
      <input type="text" id="postname" name="postname" value="{{ $post->title }}" class="form-control input-lg text-center" readonly>
      <input type="text" id="postpost" name="postpost" value="{{ $post->post }}" class="form-control input-lg text-center mt-3" readonly>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger">Delete it!</button>
    </div>
</form>

@endsection
