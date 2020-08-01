<x-admin-master>   

    @section('content')
        <h1>Edit a Post</h1>

        <form method="POST" action="{{route('post.update', ['id' => $post->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <div class="mb-4">
                    <img class="img-thumbnail" src="{{$post->post_image}}" alt="post_image" style="height:130px">
                </div>
                <input type="file" name="post_image" class="form-control_file" id="post_image">
            </div>
            {{-- <div class="form-group">
                <div class="input-group" style="width:30%">
                    <label for="file" class="inpu-group-btn">
                        <span class="btn btn-primary">
                            Choose File<input type="file" name="post_image" class="form-control-file" id="post_image" style="display:none">
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div>
            </div> --}}
            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection

</x-admin-master>