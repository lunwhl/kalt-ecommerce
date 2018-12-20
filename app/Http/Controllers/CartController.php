<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Shoppingcart;
use App\Installation;
use Cart;
use Auth;
use App\Common;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = $this->getCartByAuth();
        
        return response(['cart' => $carts]);
    }

    public function getCartByAuth()
    {
        if(Auth::check()) {
            $cartContent = Shoppingcart::where('identifier', Auth::id())->first();
            $carts = $this->getCartFromDB($cartContent);
        } else {
            Cart::content()->each(function($cart) use (&$carts)
            {
                $cart->image_path = Product::find($cart->id)->image_path;
                $carts[] = $cart;
            });   
        }

        return $carts;
    }

    public function getCartFromDB($cartContent)
    {
        $carts = [];

        unserialize($cartContent->content)->each(function($cart) use (&$carts)
        {
            $cart->image_path = Product::find($cart->id)->image_path;
            $carts[] = $cart;
        }); 

        return $carts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        Common::addCartDependAuth();

        $carts = $this->getCartByAuth();

        return response(['cart' => $carts]);
    }

    /**
     * get the cart
     *
     * @return CartCollection
     */
    public function addToCart(Product $product)
    {
        $index = 0;
        $processed_product = array();
        $processed_product[$index]['id'] = $product->id;
        $processed_product[$index]['name'] = $product->name;
        $processed_product[$index]['qty'] = request()->qty ? request()->qty : 1;
        $processed_product[$index]['price'] = $product->price;
        $processed_product[$index]['options'] = ['installation' => 'none', 'productTotalPrice' => $product->price, 'installationPrice' => 0];

        Cart::add($processed_product);
        $cart = Cart::content();

        Common::addCartDependAuth();
        
        return response(['cart' => $cart]);
    }

    public function viewCart()
    {
        $is_auth = Auth::check();

        return view('cart.page', ['is_auth' => $is_auth]);
    }

    public function updateBulkToCart()
    {
        $request = json_decode(request()->getContent(), true);
        Cart::destroy();
        Cart::add($request[0]['cart']);
        
        Common::addCartDependAuth();

        $carts = $this->getCartByAuth();

        dd($carts);

        return response(['cart' => $carts]);
    }

    public function updateInstallation()
    {
        $request = json_decode(request()->getContent(), true);

        if(request()->has('type')){
            $product = Product::find($request['id']);

            if(request()->type == 'none')
                return response(['installationPrice' => $product->price]);

            $type = $product->categories->where('type', 'type')->first();
            $hp = $product->categories->where('type', 'horsepower')->first();

            if($type && $hp)
                $installation = Installation::where('horsepower', $hp->name)->where('aircond_type', $type->name)
                                        ->where('installation_type', request()->type)->first();
            else
                return response(['installationPrice' => $product->price]);
            
            if($installation)
                return response(['installationPrice' => $product->price + $installation->price]);
            else
                return response(['installationPrice' => $product->price]);
        }
    }
}
