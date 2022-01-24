<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.admin.home',compact('products'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $products = Product::all();
        return view('main',compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $products = Product::all();
        return view('dashboard.user.home',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID1' => 'required',
            'title1' => 'required',
            'price1' => 'required',
            'gender1' => 'required',
            'color1' => 'required',
            'filter1' => 'required',
        ],[
            'ID1.required'=>'The ID field is required.',
            'title1.required'=>'The Title field is required.',
            'price1.required'=>'The Price field is required.',
            'gender1.required'=>'The Gender field is required.',
            'color1.required'=>'The Color field is required.',
            'filter1.required'=>'The Filter field is required.',
        ]);

        $ID1 = $request->ID1;
        $title1 = $request->title1;
        $price1 = $request->price1;
        if($image1 = $request->file('file')){
        $imageName = time().'.'.$image1->extension();
        $image1 ->move(public_path('images'),$imageName);
        }

        $gender1 = $request->gender1;
        $color1 = $request->color1;
        $filter1 = $request->filter1;

        $product = new Product();
        $product->ID1 = $ID1;
        $product->title1 = $title1;
        $product->price1 = $price1;
        $product->image1 = $imageName;
        $product->gender1 = $gender1;
        $product->color1 = $color1;
        $product->filter1 = $filter1;
        
        $product->save();

        return back()->with('product_added','product has added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product,$id)
    {
        $product = Product::find($id);
        return view('dashboard.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $product = Product::find($id);
        return view('dashboard.products.edit',compact('product'));
    }
    
        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show1(Product $product,$id)
    {
        $product = Product::find($id);
        return view('dashboard.products.show1', ['product' => $product]);
    }

    public function show2(Product $product,$id)
    {
        $product = Product::find($id);
        return view('dashboard.products.show2', ['product' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function ring()
    {
        $rings = DB::table('products')->where('filter1', 'ring')->get();
        return view('dashboard.filter.ring')->with('rings' , $rings);
    }

    public function bracelet()
    {
        $bracelets = DB::table('products')->where('filter1', 'bracelet')->get();
        return view('dashboard.filter.bracelet')->with('bracelets' , $bracelets);
    }

    public function necklaces()
    {
        $necklaces = DB::table('products')->where('filter1', 'necklaces')->get();
        return view('dashboard.filter.necklaces')->with('necklaces' , $necklaces);
    }

    public function earing()
    {
        $earings = DB::table('products')->where('filter1', 'earing')->get();
        return view('dashboard.filter.earing')->with('earings' , $earings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'ID1' => 'required',
            'title1' => 'required',
            'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price1' => 'required',
            'gender1' => 'required',
            'color1' => 'required',
            'filter1' => 'required',
        ],[
            'ID1.required'=>'The ID field is required.',
            'title1.required'=>'The Title field is required.',
            'image1.mims'=>'The Image must be png.',
            'price1.required'=>'The Price field is required.',
            'gender1.required'=>'The Gender field is required.',
            'color1.required'=>'The Color field is required.',
            'filter1.required'=>'The Filter field is required.',
        ]);

        $ID1 = $request->ID1;
        $title1 = $request->title1;
        $price1 = $request->price1;
        $image1 = $request->file('file');
        $imageName = time().'.'.$image1->extension();
        $image1 ->move(public_path('images'),$imageName);
        $gender1 = $request->gender1;
        $color1 = $request->color1;
        $filter1 = $request->filter1;

        $product = Product::find($request->id);
        $product->ID1 = $ID1;
        $product->title1 = $title1;
        $product->price1 = $price1;
        $product->image1 = $imageName;
        $product->gender1 = $gender1;
        $product->color1 = $color1;
        $product->filter1 = $filter1;
        
        $product->save();

        return back()->with('product_updated','product has updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        $product =  Product::find($id);
        unlink(public_path('images').'/'.$product->image1);
        $product->delete();
        return back()->with('product_deleted', 'Product deleted successfully');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $products = Product::query()
            ->where('title1', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('dashboard.search', compact('products'));
    }
}
