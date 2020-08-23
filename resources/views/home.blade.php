<x-home-master>

@section('content')

    <h1 class="my-4">New Posts</h1>

        <!-- Blog Post -->
        @foreach ($posts as $post)

        <div class="card mb-4">
          <img class="card-img-top" src="{{asset('/storage/'.$post->post_image)}}" alt="{{$post->post_image}}" style="width:auto; height:300px; object-fit: cover;">
          <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{!! Str::limit($post->body, 50, '...') !!}</p>
            <a href="{{route('post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            {{-- Posted on {{$post->created_at->diffForHumans()}} --}}
            <a href="#">Start Bootstrap</a>
          </div>
        </div>

        @endforeach

        <div class="d-flex justify-content-center">
          {{$posts->links()}}
        </div>

        {{-- <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">Post Title</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>

        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">Post Title</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div> --}}

@endsection

@section('categories')

  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <form method="POST" action="">
        @csrf
        <table>
          @foreach ($categories as $category)
            <tr>
              <td>
                <input type="checkbox" id="category" name="categories[]" value="{{$category->id}}">
                <label class="mr-3" for="category">{{$category->name}}</label>
              </td>
            </tr>
          @endforeach
        </table>
      </form>
    </div>
  </div>

@endsection

</x-home-master>