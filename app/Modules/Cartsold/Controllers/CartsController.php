<?php

namespace App\Modules\Carts\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Modules\Partners\Models\Partners;
use App\Page;


class CartsController extends Controller
{
    public function __construct(Products $product)
    {
        $this->product = $product;
    }
    public function getGrandTotal(){
        $total = Cart::total();
        return response()->json(['total'=>$total]);
    }
    /**
     * Add To Cart
     *
     * @param Request $request
     * @return void
     */
    public function addToCart(Request $request)
    {
        $product = $this->product->find($request->id);
        if($request->quantity) {
            $data = [
            'id' => $product->id,
            'name'=> $product->product_name,
            'qty'=>$request->quantity,
            'price'=> $product->market_price
        ];
        }
        else{
            $data = [
            'id' => $product->id,
            'name'=> $product->product_name,
            'qty'=>1,
            'price'=> $product->market_price
        ];
        }
        Cart::add($data);
        $total = Cart::total();
        if($request->ajax()){
            return response()->json(['total'=>$total]);
        }
        $request->session()->flash('su', "product is added to cart");

        return redirect()->back()->with('success', 'Added to Cart');

    }

    public function cart(Request $request)
    {
        $products = $this->product->find($request->id);
       
        
        $partners = Partners::orderBy('id', 'desc')->take(6)->get();

        $aboutus = Page::orderBy('id', 'desc')->take(1)->get();
        $data = Cart::content();

        return view('Carts::cart', compact('data','partners','aboutus','products'));
    }

    public function getCartList(Request $request)
    {
        if ($request->ajax()) {
            $data = Cart::content();
            return response()->json($data);
        }
    }

    public function remove(Request $request)
    {
        
        Cart::remove($request->id);
       

        return redirect()->back();
    }

    public function checkout(){

        $partners = Partners::orderBy('id', 'desc')->take(6)->get();

        $aboutus = Page::orderBy('id', 'desc')->take(1)->get();

         return view("Carts::payment", compact('partners','aboutus'));
    }
}
