<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit post</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<header>

<a href="{{ route('home1') }}" class="logo">Gemstone<span>.</span></a>
<input type="checkbox" name="" id="toggler">
<label for="toggler" class="fas fa-bars"></label>

<nav class="navbar">
    <a href="{{route('ring')}}">ring</a>
    <a href="{{route('bracelet')}}">Bracelet</a>
    <a href="{{route('earing')}}">Earing</a>
    <a href="{{route('necklaces')}}">Necklaces</a>
</nav>

<div class="icons">
    <form method="get" class="fas fa-shopping-cart" action="{{route('user.product.cartshow')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
        <input class="button" type="submit" value="shopping cart"> 
    </form>
    <a href="{{route('user.profile')}}" class="fas fa-user"></a>
</div>

</header>

<section class="home" id="home">

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
        <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="font-size:20px;color:red;">Logout</a>
        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form><br>
        <form method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
            <div class="form-group">


                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" value="{{Auth::guard('web')->user()->name}}"><br>
                <br>
                <label for="email">Email: </label>
                <input type="text" class="form-control" name="email" value="{{Auth::guard('web')->user()->email}}"><br>
                <br>
                <br>
                <input class="sub" type="submit" value="Update profile"> 
            </div>
        </form>
    </div>
    
</section>
</body>
</html>