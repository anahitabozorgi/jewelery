<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Post</h2>
        </div>
    </div>
</div>
<form action="">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jewelery ID:</strong>
                <input type="text" name="Jewelery_ID" class="form-control" value="{{ old('Jewelery_ID') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jewelery Title:</strong>
                <input type="text" name="Jewelery_Title" class="form-control" value="{{ old('Jewelery_Title') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jewelery Image:</strong>
                <input type="file" name="Jewelery_Image" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" name="Price" class="form-control" value="{{ old('Price') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><label for="Color">Color:</label><br></strong>
                    <input type="radio" id="Gold" name="Color" value="{{old('Gold')}}">
                    <label for="Gold">Gold</label><br>
                    <input type="radio" id="RoseGold" name="Color" value="{{old('RoseGold')}}">
                    <label for="RoseGold">RoseGold</label><br>
                    <input type="radio" id="Silver" name="Color" value="{{old('Silver')}}">
                    <label for="Silver">Silver</label><br>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
           <strong><label for="Gender">Gender:</label><br></strong> 
                <input type="radio" id="female" name="Gender" value="{{old('female')}}">
                <label for="female">female</label><br>
                <input type="radio" id="male" name="Gender" value="{{old('male')}}">
                <label for="male">male</label><br>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong><label for="Filter">Filter:</label><br></strong> 
                 <input type="radio" id="Earing" name="Filter" value="{{old('Earing')}}">
                 <label for="Earing">Earling</label><br>
                 <input type="radio" id="Ring" name="Filter" value="Ring">
                 <label for="Ring">Ring</label><br>
                 <input type="radio" id="Necklaces" name="Filter" value="{{old('Necklaces')}}">
                 <label for="Necklaces">Necklaces</label><br>
                 <input type="radio" id="Bracelate" name="Filter" value="{{old('Bracelate')}}">
                 <label for="Bracelate">Bracelate</label><br>
         </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add Post</button>
        </div>
    </div>
</form>