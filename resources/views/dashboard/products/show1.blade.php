<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>details</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/detailsadmin.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="robots" content="noindex,follow" />

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
<br>
<br><br><br><br><br><br>

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
          <a href="{{ route('admin.destroy', ['id' => $product->id]) }}" onclick="event.preventDefault();document.getElementById('destroy-form').submit();">delete product</a>
          <form action="{{ route('admin.destroy',['id' => $product->id]) }}" method="post" class="d-none" id="destroy-form">@csrf</form><br>
        </div>
      </div>
    </main>
  </body>
</html>
