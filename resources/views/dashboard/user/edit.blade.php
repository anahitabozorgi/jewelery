<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit post</title>
</head>
<body>
    <h2> Edit Profile</h2>
    <div class="body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('user_updated'))
            <div class="alert alert-success" role="alert">
                {{Session::get('user_updated')}}
            </div>
        @endif

        <form method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
            <div class="form-group">


                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{Auth::guard('web')->user()->name}}"><br>
                <br>
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{Auth::guard('web')->user()->email}}"><br>
                <br>
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="">
                <input type="submit" value="Update profile"> 
            </div>
        </form>
    </div>
</body>
</html>