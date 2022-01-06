<input type="hidden"{{$sum = 0}}> 
@if (Session::has('product_deleted'))
<div class="alert alert-success" role="alert">
    {{Session::get('product_deleted')}}
</div>
@endif
@foreach ($shows as $product)
<tr>
    <td>{{$product->title2}}</td><br>
    <td>{{$product->price2}}$</td>
    <td><img src="{{asset('images')}}/{{$product->image2}}" style="max-width:200px;"/></td>
    <input type="hidden" {{$sum = $sum+(int)$product->price2}}>
<br>
    <br>
</tr>
@endforeach
<h3>Total:{{$sum}}$</h3>