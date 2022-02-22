<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/shopping.css') }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
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
<br>
<br>
<br>
<br>
<input type="hidden"{{$sum = 0}}> 
@if (Session::has('product_deleted'))
<div class="alert alert-success" role="alert">
    {{Session::get('product_deleted')}}
</div>
@endif
@if (Session::has('ordered'))
<div class="alert alert-success" role="alert">
    {{Session::get('ordered')}}
</div>
@endif
<div class="container">


	<div class="cart">

		<div class="products">
      @foreach ($shows as $product)
        <div class="product">

          <img src="{{asset('images')}}/{{$product->image2}}" />

          <div class="product-info">
            <h2 class="product-name">{{$product->title2}}</h2>
            <h3 class="product-price">${{$product->price2}}</h3>
            <input type="hidden" {{$sum = $sum+(float)$product->price2}}>
            <p class="product-remove">
              <form action="{{route('user.cart.destroy' , ['id' => $product->id])}}"method="post">
                  @csrf
                  <button type="submit"><i class="fa fa-trash" aria-hidden="true"><span class="remove">Remove</span></i></button>
              </form>
            </p>

          </div>

        </div>
      @endforeach
		</div>

		<div class="cart-total">
			<p>
				<span>Total Price</span>
				<span>${{$sum}}</span>
			</p>
			<form action="{{route('user.order')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
          <button type="submit">Order now</button>
      </form>
		</div>

	</div>

</div>
</body>
</html>

