<x-home-master>

  @section('content')

    <!-- Title -->
  <h1 class="mt-4">{{$post->title}}</h1>

  @if(session('comment-posted-message'))
    <div class="alert alert-success">{{session('comment-posted-message')}}</div>
  @elseif(session('comment-deleted-message'))
    <div class="alert alert-danger">{{session('comment-deleted-message')}}</div>
  @endif
    
    <!-- Author -->
    <p class="lead">
      by
      <a href="#">Start Bootstrap</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{$post->post_image}}" alt="{{$post->post_image}}" style="width:900px; height:300px; object-fit:cover">

    <hr>

    <!-- Post Content -->
    <p class="lead">{!! $post->body !!}</p>

    <hr>

    <!-- Comments Form -->
    <div class="card my-4">
      <h5 class="card-header">Leave a Comment:</h5>
      <div class="card-body">
        <form method="POST" action="{{route('comment.store', ['post' => $post])}}">
          @csrf
          <div class="form-group">
            <textarea class="form-control" rows="3" name="comment"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

    <!-- Single Comment -->
    @foreach ($comments as $comment)
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="{{$comment->user->avatar}}" alt="{{$comment->user->avatar}}" style="height:40px">
        <div class="media-body">
          <h5 class="mt-0">{{$comment->user->username}}</h5>
          <div>{{$comment->comment}}</div>
          <div class="float-right text-secondary">{{$comment->created_at->diffForHumans()}}</div>
        </div>
        <form method='POST' action="{{route('comment.destroy', $comment)}}">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">Delete</button>
        </form>
      </div>    
    @endforeach
    {{-- <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
      </div>
    </div> --}}

    <!-- Comment with nested comments -->
    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

        <div class="media mt-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <div class="media mt-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

      </div>
    </div>
    
    @endsection

</x-home-master>