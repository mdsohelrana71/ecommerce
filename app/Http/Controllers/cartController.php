<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Cart;

use Illuminate\Http\Request;

class cartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::find($request->product_id);
        Cart::add([
            'id'       => $product->id,
            'name'     => $product->product_name,
            'price'    => $product->product_price,
            'quantity' => $request->qty,
            'attributes' =>[
                    'image'  =>$product->product_image,
                    'code'   =>$product->product_code,
            ]
        ]);
        return redirect('/cart/show-cart');
    }
    public function showCart(){
        $cartCollection = Cart::getContent();
        $categorys = Category::where('publication_status',1)->get();
        return view('front.cart.show-cart',[
            'categorys'      =>$categorys,
            'cartCollection' =>$cartCollection
        ]);
    }
    public function updateCart(Request $request){
        Cart::update($request->id,['quantity' => [
            'relative' => false,
            'value'    => $request->qty,
        ]]);
        return redirect()->back();
    }

    public function removeCartProduct($id){
        Cart::remove($id);
        return redirect()->back();
    }
}
