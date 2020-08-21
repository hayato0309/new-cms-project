<x-admin-master>
    @section('content')
        <h1>Edit Category : {{$category->name}}</h1>

        @if(session('category-updated-message'))
            <div class="alert alert-success">{{session('category-updated-message')}}</div>
        @elseif(session('category-not-updated-message'))
            <div class="alert alert-secondary">{{session('category-not-updated-message')}}</div>
        @endif

        <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="{{route('categories.update', $category->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
                    </div>
                    <button class="btn btn-primary mb-3">Update</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>