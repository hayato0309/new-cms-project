<x-admin-master>   

    @section('content')

        @include('includes.tinyeditor')

        <h1>Create</h1>

        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title">
            </div>
            <div class="form-group">
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
                <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
            </div>
            
            <div class="mb-2">Select categories</div>
            @foreach ($categories as $category)
                <input type="checkbox" id="category" name="categories[]" value="{{$category->id}}">
                <label class="mr-3" for="category">{{$category->name}}</label>
            @endforeach

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection

</x-admin-master>