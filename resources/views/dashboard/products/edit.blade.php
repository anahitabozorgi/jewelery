<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit post</title>
</head>
<body>
    <h2> Edit Product</h2>
    <div class="body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('product_updated'))
            <div class="alert alert-success" role="alert">
                {{Session::get('product_updated')}}
            </div>
        @endif

        <form method="post" action="{{route('admin.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="form-group">

                <label for="ID1">Jewelery ID:</label> 
                <input type="text" name="ID1" value="{{$product->ID1}}"><br>
                <br>
                <label for="title1">Jewelery Title:</label>
                <input type="text" name="title1" value="{{$product->title1}}"><br>
                <br>
                <label for="price1">Price:</label>
                <input type="text" name="price1" value="{{$product->price1}}"><br>
                <img src="{{asset('images')}}/{{$product->image1}}" alt="product image" style="max-width: 200px">
                <br>
        
                <label for="file">Jewelery Image:</label>
                <input type="file" name="file" class="form-control">
                <br>
                <br>

                <label for="color1">Color:</label><br>
                <input type="radio" id="Gold" name="color1" value="Gold" {{ $product->color1 == 'Gold' ? 'checked' : '' }}>
                <label for="Gold">Gold</label><br>
                <input type="radio" id="RoseGold" name="color1" value="RoseGold" {{ $product->color1 == 'RoseGold' ? 'checked' : '' }}>
                <label for="RoseGold">RoseGold</label><br>
                <input type="radio" id="Silver" name="color1" value="Silver" {{ $product->color1 == 'Silver' ? 'checked' : '' }}>
                <label for="Silver">Silver</label><br>
        
                <label for="gender1">Gender:</label><br>
                <input type="radio" id="female" name="gender1" value="female" {{ $product->gender1 == 'female' ? 'checked' : '' }}>
                <label for="female">female</label><br>
                <input type="radio" id="male" name="gender1" value="male" {{ $product->gender1 == 'male' ? 'checked' : '' }}>
                <label for="male">male</label><br>

                <label for="filter1">Filter:</label><br>
                    <input type="radio" id="Bracelet" name="filter1" value="Bracelet" {{ $product->filter1 == 'Bracelet' ? 'checked' : '' }}>
                    <label for="Bracelet">Bracelet</label><br>

                    <input type="radio" id="Ring" name="filter1" value="Ring" {{ $product->filter1 == 'Ring' ? 'checked' : '' }}>
                    <label for="Ring">Ring</label><br>

                    <input type="radio" id="Earing" name="filter1" value="Earing" {{ $product->filter1 == 'Earing' ? 'checked' : '' }}>
                    <label for="Earing">Earing</label><br>

                    <input type="radio" id="Necklaces" name="filter1" value="Necklaces" {{ $product->filter1 == 'Necklaces' ? 'checked' : '' }}>
                    <label for="Necklaces">Necklaces</label><br>

                <input type="submit" value="Update product"> 
            </div>
        </form>
    </div>
</body>
</html>