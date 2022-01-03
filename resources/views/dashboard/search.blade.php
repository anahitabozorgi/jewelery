@if($products->isNotEmpty())
    @foreach ($products as $pro)
        <div>
            <p>{{ $pro->title1 }}</p>
            <img src="{{asset('images')}}/{{$pro->image1}}" style="max-width:200px;"/>
        </div>
    @endforeach
@else 
    <div>
        <h2>No posts found</h2>
    </div>
@endif