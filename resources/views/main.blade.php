<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gemstone Gallery</title>
</head>
<body>
    @if (Route::has('user.login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/user/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a><br>
            <br>
            <a href="{{route('ring')}}">Ring</a>
            <a href="{{route('bracelet')}}">Bracelet</a>
            <a href="{{route('earing')}}">Earing</a>
            <a href="{{route('necklaces')}}">Necklaces</a>
            <form method="get" action="{{route('user.product.cartshow')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
                <input class="button" type="submit" value="your shopping cart"> 
            </form>
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
            @foreach ($products as $product)
            <tr>
                <td>{{$product->title1}}</td><br>
                <td>{{$product->price1}}$</td>
                <td><img src="{{asset('images')}}/{{$product->image1}}" style="max-width:200px;"/></td>
                <td><a href="{{route('user.product.show',['id' => $product->id])}}">details</a></td>
                <td><form method="post" action="{{route('user.product.cart',['id' => $product->id])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
                    <input type="submit" value="Add to Cart"> 
                </form></td>
            </tr>
        @endforeach
        @else
            <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
            <br>
            @if (Route::has('user.register'))
                <a href="{{ route('user.register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a><br>
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="search" required/>
                    <button type="submit">Search</button>
                </form>
                <a href="{{route('ring')}}">Ring</a>
                <a href="{{route('bracelet')}}">Bracelet</a>
                <a href="{{route('earing')}}">Earing</a>
                <a href="{{route('necklaces')}}">Necklaces</a>
                <br>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->title1}}</td><br>
                    <td>{{$product->price1}}$</td>
                    <td><img src="{{asset('images')}}/{{$product->image1}}" style="max-width:200px;"/></td>
                    <td><a href="{{route('product.show',['id' => $product->id])}}">details</a></td>
                </tr>
            @endforeach
            @endif
        @endauth
    </div>
@endif
</body>
</html>