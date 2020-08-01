<x-admin-master>

    @section('content')

    <h1>User Profile for : {{$user->name}}</h1>

    <div class="row">
        <div class="col-sm-6">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <img class="img-thumbnail rounded-circle" src="" alt="user_image">
                </div>
                <div class="form-group">
                    <input type="file">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="password-confirmation">Confirm Password</label>
                    <input type="password-confirmation" name="password-confirmation" class="form-control" id="password-confirmation">
                </div>
                <button tyle="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    @endsection

</x-admin-master>