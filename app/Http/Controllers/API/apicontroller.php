<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class apicontroller extends Controller
{
    public function homepage(){
        $products = Product::all();
        
        $card_items = Cart::all();
        
        return [
            'products' => $products,
            'card_items'=> $card_items,
        ];
    }

    public function addtocart(Request $request){
        $product = Product::find($request->id);
        $cart = new Cart();
        $cart->id = $product->id;
        $cart->title2 = $product->title1;
        $cart->price2 = $product->price1;
        $cart->image2 = $product->image1;
        $cart->save();
        return "added to cart successfully";

    }
}
