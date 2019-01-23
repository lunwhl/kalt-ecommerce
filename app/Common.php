<?php

namespace App;

use App\Shoppingcart;
use Cart;
use Auth;

class Common
{
    public static function addCartDependAuth()
    {
    	if(Auth::check()) {
            if(Shoppingcart::where('identifier', Auth::id())->get()->isEmpty()) {
                Cart::store(Auth::id());
            } else {
                Shoppingcart::where('identifier', Auth::id())->delete();
                Cart::store(Auth::id());
            }
        }
    }

    public static function deleteCart()
    {
        Shoppingcart::where('identifier', Auth::id())->delete();
    }

    public static function emailLogo() {
        return 'http://kalt.local/images/kalt.png';
    }
}
