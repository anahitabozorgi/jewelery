<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $ID1 = $request->ID1;
        $title1 = $request->title1;
        $price1 = $request->price1;
        $image1 = $request->file('file');
        $imageName = time().'.'.$image1->extension();
        $image1 ->move(public_path('images'),$imageName);
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
