<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/login.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
      <img src="{{asset('images')}}/frontImg.jpg"/>
      </div>
      <div class="back">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="{{route('user.check')}}" method="post">
            @csrf
            @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>  
            @endif
            <div class="input-boxes">
              <div class="input-box">
                <label for="email"></label>
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
              </div>
              <div class="input-box">
                <label for="password"></label>
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" value="{{old('password')}}">
                <span class="text-danger">@error('password'){{$message}} @enderror</span>
              </div>
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip"><a href="{{ route('user.register') }}"> Sigup now</a></label></div>
            </div>
        </form>
      </div>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
