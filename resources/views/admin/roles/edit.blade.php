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
                    <button class="btn btn-primary mb-3">Update</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @if($permissions->isNotEmpty())
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td><input type="checkbox"
                                                @foreach ($role->permissions as $role_permission)
                                                    @if($role_permission->slug == $permission->slug)
                                                        checked
                                                    @endif
                                                @endforeach>
                                            </td>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->slug}}</td>
                                            <td>
                                                <form method="post" action="{{route('role.permission.attach', $role->id)}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="permission" value="{{$permission->id}}">
                                                    <button type="submit" class="btn btn-primary" {{$role->permissions->contains($permission) ? 'disabled' : ''}}>Attach</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="post" action="{{route('role.permission.detach', $role->id)}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="permission" value="{{$permission->id}}">
                                                    <button type="submit" class="btn btn-danger" {{$role->permissions->contains($permission) ? '' : 'disabled'}}>Detach</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-secondary">No permissions for this role.</div>
                @endif
            </div>
        </div>

    @endsection

</x-admin-master>