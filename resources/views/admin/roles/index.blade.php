<x-admin-master>
        @section('content')
    
            <h1>Roles</h1>

            @if(session('role-created-message'))
                <div class="alert alert-success">
                    {{session('role-created-message')}}
                </div>
            @endif

            <div>
                @if(session('role-deleted-message'))
                    <div class="alert alert-danger">{{session('role-deleted-message')}}</div>
                @endif
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <form method="POST" action="{{route('roles.store')}}">
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
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                                            <td>{{$role->slug}}</td>
                                            <td>
                                                <form method="post" action="{{route('roles.destroy', $role->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @endsection
    </x-admin-master>