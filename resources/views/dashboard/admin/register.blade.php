<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Add Admin</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/login.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
      <img src="{{asset('images')}}/pexels-dmitry-zvolskiy-1721937.jpg"/>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Add Admin</div>
            <form action="{{route('admin.add')}}" method="post">
            @csrf
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>   
            @endif

            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @endif
            <div class="input-boxes">
            <div class="input-box">
                <label for="name"></label>
                <i class="fas fa-user-circle"></i>
                <input type="text" placeholder="Enter a name" name="name" value="{{old('name')}}">
                <span class="text-danger">@error('name'){{$message}} @enderror</span>
              </div>
              <div class="input-box">
                <label for="email"></label>
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter an email" name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
              </div>
              <div class="input-box">
                <label for="password"></label>
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter a password" name="password" value="{{old('password')}}">
                <span class="text-danger">@error('password'){{$message}} @enderror</span>
              </div>
              <div class="input-box">
                <label for="cpassword"></label>
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter a password" name="cpassword" value="{{old('cpassword')}}">
                <span class="text-danger">@error('cpassword'){{$message}} @enderror</span>
              </div>
              <div class="button input-box">
                <input type="submit" value="signup">
              </div>
              <div class="text sign-up-text"> <label for="flip"><a href="{{ route('admin.home') }}"> go back</a></label></div>
            </div>
        </form>
      </div>
    </div>
    </div>
    </div>
  </div>
</body>
</html>