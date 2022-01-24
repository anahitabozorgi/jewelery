<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User login</title>
</head>
<body>
    <style>
        .button {
          background-color: white;
          border: none;
          color: black;
          text-align: center;
          text-decoration: none;
          float: right;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
    </style>
    <p>user dashboard</p>
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
    <a href="{{route('user.profile')}}">edit profile</a>
    <a href="{{route('ring')}}">ring</a>
    <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form><br>

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
</body>
</html>