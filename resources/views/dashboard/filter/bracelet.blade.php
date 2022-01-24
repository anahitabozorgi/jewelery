@foreach ($bracelets as $product)
<tr>
    <td>{{$product->title1}}</td><br>
    <td>{{$product->price1}}$</td>
    <td><img src="{{asset('images')}}/{{$product->image1}}" style="max-width:200px;"/></td>
    <td><a href="{{route('product.show',['id' => $product->id])}}">details</a></td>
    <br>
    <br>
</tr>
@endforeach