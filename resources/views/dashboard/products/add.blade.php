<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add post</title>
</head>
<body>
    <h2>Add New Post</h2>
    <div class="body">
        <form method="POST" enctype="multipart/form-data" action="">
            @csrf
            <div class="form-group">
                <label for="ID1">Jewelery ID</label> 
                <input type="text" name="ID1"><br>
                <br>
                <label for="title1">Jewelery Title</label>
                <input type="text" name="title1"><br>
                <br>
                <label for="price1">Price</label>
                <input type="text" name="price1"><br>
                <br>
        
                <label for="file">Jewelery Image</label>
                <input type="file" name="file" class="form-control" onchange="PreviewFile(this)">
                {{-- <img id="previewImg" alt="product image" style="max-width: 130px"> --}}
                <br>
                <br>
                <label for="color1">Color</label><br>
                <input type="radio" id="Gold" name="color1" value="Gold">
                <label for="Gold">Gold</label><br>
                <input type="radio" id="RoseGold" name="color1" value="RoseGold">
                <label for="RoseGold">RoseGold</label><br>
                <input type="radio" id="Silver" name="color1" value="Silver">
                <label for="Silver">Silver</label><br>
        
                <label for="gender1">Gender</label><br>
                <input type="radio" id="female" name="gender1" value="female">
                <label for="female">female</label><br>
                <input type="radio" id="male" name="gender1" value="male">
                <label for="male">male</label><br>
                <input type="submit" value="Add product"> 
            </div>
        </form>
    </div>

    <script>
        function previewFile(input){
            var file =$("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload=function(){
                    $('#previewImg').attr('src',reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>