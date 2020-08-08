<x-admin-master>

    @section('content')

    <h1>User Profile for : {{$user->name}}</h1>

    @if(session('user-profile-updated-message'))
        <div class="alert alert-success">{{session('user-profile-updated-message')}}</div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            <form method="POST" action="{{route('user.profile.update', ['id' => auth()->user()->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <img class="rounded" src="{{$user->avatar}}" alt="user_image" style="height:100px">
                </div>

                <div class="form-group">
                    <input type="file" name="avatar">
                </div>

                <div class="form-group">
                    <label for="name">Username</label>
                    {{-- <input type="text" name="username" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" value="{{$user->username}}"> --}}
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{$user->username}}">
                    @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" value="{{$user->name}}">
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" value="{{$user->email}}">
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password">
                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control {{$errors->has('password-confirmation' ? 'is-invalid' : '')}}" id="password-confirmation">
                    @error('password-confirmation')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <button tyle="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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
                        @foreach ($roles as $role)
                            <tr>
                                <th><input type="checkbox"
                                            @foreach ($user->roles as $user_role)
                                                @if($user_role->slug == $role->slug)
                                                    checked
                                                @endif
                                            @endforeach>
                                    </th>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td><button class="btn btn-primary">Attach</button></td>
                                <td><button class="btn btn-danger">Detach</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    @endsection

</x-admin-master>