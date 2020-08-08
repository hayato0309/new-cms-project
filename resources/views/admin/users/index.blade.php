<x-admin-master>
    @section('content')
        <h1>Users</h1>

        @if(session('user-deleted-message'))
            <div class="alert alert-success">{{session('user-deleted-message')}}</div>
        @endif
            

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Registered Date</th>
                        <th>Updated Date</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Registered Date</th>
                        <th>Updated Date</th>
                        <th>Delete</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{route('user.profile.show', ['id' => $user->id])}}">{{$user->username}}</a></td>
                            <td><img class="rounded" height="40px" src="{{$user->avatar}}" alt="profile_image"></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            <td>
                                <form method="POST" action="{{route('user.destroy', ['user' => $user->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        <td>

                            {{-- @can('view', $post)

                            <form method="POST" action="{{route('post.destroy', ['id' => $post->id])}}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            @endcan --}}
                            
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {{$users->links()}}
        </div>
    @endsection

    {{-- 必要なページにのみ @yield @section をうまく使ってscriptを入れる。
    こうすることでプロジェクトを無駄に重くすることがない。 --}}
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
        {{-- LaravelのPaginationを有効にするために、プラグインのPaginationを止めている。 --}}
    @endsection
</x-admin-master>