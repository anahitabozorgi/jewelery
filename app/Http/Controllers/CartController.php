<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart(Request $request,Product $product,$id,User $user)
    {
        $product = Product::find($id);
        $user = User::find($request->id);
        $cart = new Cart();
        $cart->title2 = $product->title1;
        $cart->price2 = $product->price1;
        $cart->email1 = $user->email;
        $cart->image2 = $product->image1;
        $save = $cart->save();
        if($save){
            return redirect()->back()->with('success', 'successfully added to cart');
        }else{
            return redirect()->back()->with('fail', 'something went wrong');
        }

    }

    public function cartshow(Request $request,User $user){
        $user = User::find($request->id);
        $shows = DB::table('carts')->where('email1',$user->email)->get();
        return view('dashboard.cart')->with('shows' , $shows);
    }

    public function destroy(Cart $cart, $id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return back()->with('product_deleted', 'Product deleted successfully');
    }
    
    public function order(Request $request,User $user){
        $user = User::find($request->id);
        $shows = DB::table('carts')->where('email1',$user->email)->delete();

        return back()->with('ordered', 'Product ordered successfully');
        
    }
    
}

