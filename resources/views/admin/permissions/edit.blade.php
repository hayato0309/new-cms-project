<x-admin-master>
    @section('content')
        <h1>Edit Permission : {{$permission->name}}</h1>

        @if(session('permission-updated-message'))
            <div class="alert alert-success">{{session('permission-updated-message')}}</div>
        @elseif(session('permission-not-updated-message'))
            <div class="alert alert-secondary">{{session('permission-not-updated-message')}}</div>
        @endif

        <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="{{route('permissions.update', $permission->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$permission->name}}">
                    </div>
                    <button class="btn btn-primary mb-3">Update</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>