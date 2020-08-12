<x-admin-master>

    @section('content')

        <h1>Edit Role : {{$role->name}}</h1>

        @if(session('role-updated-message'))
            <div class="alert alert-success">{{session('role-updated-message')}}</div>
        @elseif(session('role-not-updated-message'))
            <div class="alert alert-secondary">{{session('role-not-updated-message')}}</div>
        @endif

        <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="{{route('roles.update', $role->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}">
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    @endsection

</x-admin-master>