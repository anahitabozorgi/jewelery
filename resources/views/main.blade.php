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
            <a href="{{route('ring')}}">ring</a>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->title1}}</td><br>
                <td>{{$product->price1}}$</td>
                <td><img src="{{asset('images')}}/{{$product->image1}}" style="max-width:200px;"/></td>
                <td><a href="{{route('user.product.show',['id' => $product->id])}}">details</a></td>
            </tr>
        @endforeach
        @else
            <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
            <br>
            @if (Route::has('user.register'))
                <a href="{{ route('user.register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a><br>
                <a href="{{route('ring')}}">ring</a>
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