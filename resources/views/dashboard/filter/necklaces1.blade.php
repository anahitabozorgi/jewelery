<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
    <a href="{{route('home1')}}" class="logo">Gemstone<span>.</span></a>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="{{route('user.ring')}}">ring</a>
        <a href="{{route('user.bracelet')}}">Bracelet</a>
        <a href="{{route('user.earing')}}">Earing</a>
        <a href="{{route('user.necklaces')}}">Necklaces</a>
    </nav>

    <div class="icons">
        <form method="get" class="fas fa-shopping-cart"  enctype="multipart/form-data">
            @csrf
            <input class="button" onclick="myFunction()" type="submit" value="shopping cart"> 
        </form>
        <a href="{{ route('user.login') }}" class="fas fa-user"></a>
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
        @foreach ($necklaces as $product)

        <div class="box-container">

            <div class="box">
                <div class="image">
                <a href="{{route('product.show',['id' => $product->id])}}"><img src="{{asset('images')}}/{{$product->image1}}"/></a> 
                    <div class="icons">
                    <button onclick="myFunction()">Add to cart</button>
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

    <div class="credit"> © <span>2022 Do Space</span> | all rights reserved </div>

    </section>
<script>
    function myFunction() {
      alert("please sign in first");
    }
</script>
</body>
</html>