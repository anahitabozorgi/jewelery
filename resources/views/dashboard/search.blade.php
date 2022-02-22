<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gemstone Gallery</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    @if (Route::has('user.login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
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

            <div class="content">
                <h3>Gemstone Gallary</h3>
                <span> Most Joyful Occasions </span>
                <p>Mark the moments with classic styles made to be cherished forever.</p>
                <a href="#" class="btn">shop now</a>
            </div>

            </section>


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
                @foreach ($products as $product)

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
                
                <div class = "box">
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="search" placeholder="Search.." required/>
                                <button type="submit">Search</button>
                            </form>
                        </div>

            </div>

            <div class="credit"> © <span>2022 Do Space</span> | all rights reserved </div>

            </section>
        @else
            <br>
            @if (Route::has('user.register'))

                <header>

                    <a href="" class="logo">Gemstone<span>.</span></a>
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
                    <section class="home" id="home">

                    <div class="content">
                        <h3>Gemstone Gallary</h3>
                        <span> Most Joyful Occasions </span>
                        <p>Mark the moments with classic styles made to be cherished forever.</p>
                        <a href="#" class="btn">shop now</a>
                    </div>

                    </section>


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
                        @foreach ($products as $product)

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

                        <div class = "box">
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="search" placeholder="Search.." required/>
                                <button type="submit">Search</button>
                            </form>
                        </div>

                    </div>

                    <div class="credit"> © <span>2022 Do Space</span> | all rights reserved </div>

                    </section>
                @endif
        @endauth
    </div>
@endif
<script>
    function myFunction() {
      alert("please sign in first");
    }
</script>
</body>
</html>