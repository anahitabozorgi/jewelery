<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/loginadmin.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>

    <a href="{{route('admin.home')}}" class="logo">Gemstone<span>.</span></a>
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
<br><br><br><br><br><br><br>



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

    <section class="products" id="products">
        @foreach ($bracelets as $product)

        <div class="box-container">

            <div class="box">
                <div class="image">
                <a href="{{route('admin.product.show',['id' => $product->id])}}"><img src="{{asset('images')}}/{{$product->image1}}"/></a> 
                <div class="icons">
                <a href="{{route('admin.edit',['id' => $product->id])}}">edit</a>
                </div>
                </div>
                <div class="content">
                    <h3>{{$product->title1}}</h3>
                    <div class="price"> {{$product->price1}}$ </div>
                </div>
            </div>
        </div>
        
    @endforeach
    </section>
    <br>
    <br>
</body>
</html>