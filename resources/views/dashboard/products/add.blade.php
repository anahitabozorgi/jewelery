</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/post.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>


    <div class="body">
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error')}}
            </div>
        @endif
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
        @if (Session::has('product_added'))
            <div class="alert alert-success" role="alert">
                {{Session::get('product_added')}}
            </div>
        @endif

<body>
  <div class="container">
    <input type="checkbox" id="flip">

    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Add Product</div>
            <form method="POST" action="{{route('admin.store')}}" enctype="multipart/form-data">
            @csrf
            @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>  
            @endif
            <div class="input-boxes">
              <div class="input-box">
                <label for="ID1" >Jewelery ID:</label> 
                <input type="text" name="ID1">
              </div>
              <div class="input-box">
                <label for="title1">Jewelery Title:</label>
                <input type="text" name="title1">
              </div>
              <div class="input-box">
              <label for="price1">Price:</label>
                <input type="text" name="price1">
              </div>
              <div class="input-box">
                <label for="file">Jewelery Image:</label>
                <input class="img1" type="file" name="file" class="form-control">
              </div>
              <div class="input-box">
              <label for="color1">Color:</label>
                <select name="color1" id="color1">
                <option selected>Select color</option>
                <option value="Gold">Gold</option>
                <option value="RoseGold">RoseGold</option>
                <option value="Silver">Silver</option>
              </div>
              <div class="input-box">
              <label for="filter1" style="color:rgb(39, 37, 37)">Category:</label>
                <select name="filter1" id="filter1">
                <option selected style="color:rgb(39, 37, 37)">Select category</option>
                <option value="bracelet" style="color:rgb(39, 37, 37)">bracelet</option>
                <option value="necklaces" style="color:rgb(39, 37, 37)">necklaces</option>
                <option value="earing" style="color:rgb(39, 37, 37)">earing</option>
                <option value="ring" style="color:rgb(39, 37, 37)">ring</option>
                </select>
              </div>
              <div class="input-box">
                <label for="gender1">Gender:</label>
                <select name="gender1" id="gender1">
                <option selected>Select gender</option>
                <option value="female">female</option>
                <option value="male">male</option>
                </select>
              </div>
              <div class="input-box">
              <label for="filter1">Category:</label>
                <select name="filter1" id="filter1">
                <option selected>Select category</option>
                <option value="bracelet">bracelet</option>
                <option value="necklaces">necklaces</option>
                <option value="earing">earing</option>
                <option value="ring">ring</option>
                </select>
              </div>
              <div class="button input-box">
                <input type="submit" value="Add product">
                </div>
                <div class="text sign-up-text"><label for="flip" ><a href="{{ route('admin.home') }}"> Exit</a></label></div>
                </div>
        </form>
      </div>
    </div>
    </div>
    </div>
  </div>
</body>
</html>