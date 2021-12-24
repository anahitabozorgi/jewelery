<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin dashboard</title>
</head>
<body>
    <p>Admin dashboard</p>
    @if (Session::has('product_deleted'))
        <div class="alert alert-success" role="alert">
            {{Session::get('product_deleted')}}
        </div>
    @endif
    <a href="{{ route('admin.create') }}">create new post</a>
    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form action="{{ route('admin.logout') }}" method="post" id="logout-form">@csrf</form><br>

    <div>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->title1}}</td><br>
                <td>{{$product->price1}}$</td><br>
                <td>
                    <a href=""></a>
                </td>
                <td><img src="{{asset('images')}}/{{$product->image1}}" style="max-width:200px;"/></td>
                <td><a href="{{route('admin.edit',['id' => $product->id])}}">edit</a></td>
                <a href="{{ route('admin.destroy', ['id' => $product->id]) }}" onclick="event.preventDefault();document.getElementById('destroy-form').submit();">delete</a>
                <form action="{{ route('admin.destroy',['id' => $product->id]) }}" method="post" class="d-none" id="destroy-form">@csrf</form><br>
            </tr>
        @endforeach
    </div>

</body>
</html>