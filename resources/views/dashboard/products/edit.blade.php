
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit post</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/edit.css') }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<header>

    <a href="{{ route('admin.home') }}" class="logo">Gemstone<span>.</span></a>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="{{route('admin.ring')}}">ring</a>
        <a href="{{route('admin.bracelet')}}">Bracelet</a>
        <a href="{{route('admin.earing')}}">Earing</a>
        <a href="{{route('admin.necklaces')}}">Necklaces</a>
        <a href="{{ route('admin.create') }}">new post</a>
    </nav>

    <div class="icons">
        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <a href="{{ route('admin.register') }}" class="fa fa-user-plus"></a>
        <form action="{{ route('admin.logout') }}" method="post" id="logout-form">@csrf</form>
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
        @if (Session::has('product_updated'))
            <div class="alert alert-success" role="alert">
                {{Session::get('product_updated')}}
            </div>
        @endif

        <form method="post" action="{{route('admin.update')}}" enctype="multipart/form-data">
            @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
            <div class="form-group">

            <label for="ID1">Jewelery ID:</label> 
                <input type="text" name="ID1" value="{{$product->ID1}}"><br>
                <br>
                <label for="title1">Jewelery Title:</label>
                <input type="text" name="title1" value="{{$product->title1}}"><br>
                <br>
                <label for="price1">Price:</label>
                <input type="text" name="price1" value="{{$product->price1}}"><br>

                <label for="color1">Color:</label>
                <select name="color1" id="color1">
                <option selected>{{$product->color1}}</option>
                <option value="Gold">Gold</option>
                <option value="RoseGold">RoseGold</option>
                <option value="Silver">Silver</option>
                </select><br>
        
                <label for="filter1">Category:</label>
                <select name="filter1" id="filter1">
                <option selected>{{$product->filter1}}</option>
                <option value="bracelet">bracelet</option>
                <option value="necklaces">necklaces</option>
                <option value="earing">earing</option>
                <option value="ring">ring</option>
                </select><br>

                <label for="gender1">Gender:</label>
                <select name="gender1" id="gender1">
                <option selected>{{$product->gender1}}</option>
                <option value="female">female</option>
                <option value="male">male</option>
                </select><br>

                <input class="sub" type="submit" value="Update ptoduct"> 
            </div>
        </form>
    </div>
    
</section>
</body>
</html>