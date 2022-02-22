<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User login</title>
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
<br>
<br>
<br>
<br>
<br>
<br>

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
        @foreach ($earings as $product)

        <div class="box-container">

            <div class="box">
                <div class="image">
                <a href="{{route('user.product.show',['id' => $product->id])}}"><img src="{{asset('images')}}/{{$product->image1}}"/></a> 
                    <div class="icons">
                    <form method="post" class="cart-btn" action="{{route('user.product.cart',['id' => $product->id])}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
                        <input type="submit" value="Add to Cart"> 
                    </form>
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


<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="{{ route('home1') }}">home</a>
            <a href="{{route('ring')}}">ring</a>
            <a href="{{route('bracelet')}}">Bracelet</a>
            <a href="{{route('earing')}}">Earing</a>
            <a href="{{route('necklaces')}}">Necklaces</a>
        </div>

        <div class="box">
            <h3>locations</h3>
            <a href="#">Iran</a>
            <a href="#">USA</a>
            <a href="#">japan</a>
            <a href="#">france</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <p>+548-248-9782</p>
            <p>admin@gmail.com</p>
            <p>Rasht, Iran - Golsar</p>
        </div>

    </div>

    <div class="credit"> created by <span> mr. web designer </span> | all rights reserved </div>

</section>

</body>
</html>