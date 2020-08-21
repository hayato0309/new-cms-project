<x-admin-master>
    @section('content')

        <h1>Permissions</h1>

        @if(session('permission-created-message'))
            <div class="alert alert-success">
                {{session('permission-created-message')}}
            </div>
        @endif

        <div class="row">
            <div class="col-sm-3">
                <form method="POST" action="{{route('permissions.store')}}">
                    @csrf
                    <label for="name">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">

                    <div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block mt-3" type="submit">Create</button>
                </form>
            </div>

            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{$permission->id}}</td>
                                            <td><a href="{{route('permissions.edit', $permission->id)}}">{{$permission->name}}</a></td>
                                            <td>{{$permission->slug}}</td>
                                            <td>
                                                <form method="post" action="{{route('permissions.destroy', $permission->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{$permissions->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>