<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>details</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/details.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="robots" content="noindex,follow" />

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
<br><br><br><br><br><br>
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

    <main class="container">


      <div class="left-column">
      <img src="{{asset('images')}}/{{$product->image1}}"/>
      </div>


      <div class="right-column">

        <div class="product-description">
          <h2>{{$product->title1}}</h2>
          <br>
          <br>

          <p>
            <p>ID </p><br> <h4>{{$product->ID1}}</h4>
          </p>
        </div>

        <div class="product-configuration">

          <div class="product-color">
            <span>Color</span>

            <div class="color-choose">
              <div>
              <p>{{$product->color1}}</p>
              </div>
            </div>

          </div>

          <div class="cable-config">
            <span>Gender</span>

            <div class="cable-choose">
              <button>{{$product->gender1}}</button>
            </div>
          </div>
        </div>


        <div class="product-price">
          <span>${{$product->price1}}</span>
          <form method="post" class="cart-btn" action="{{route('user.product.cart',['id' => $product->id])}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
                <input type="submit" value="Add to Cart"> 
          </form>
        </div>
      </div>
    </main>

  </body>
</html>
