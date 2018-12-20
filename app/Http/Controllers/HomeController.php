<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Product;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_auth = Auth::check();
        // dd($is_auth);
        return view('home.page', ['is_auth' => $is_auth]);
    }

    public function index2()
    {
        $is_auth = Auth::check();
        // dd($is_auth);
        return view('shop.page', ['is_auth' => $is_auth]);
    }

    public function getLatestProduct()
    {
        $products = Product::orderBy('created_at', 'desc')->take(4)->get();
        // dd($products);
        return response($products);
    }

    public function checkAuth()
    {
        return response(['auth' => Auth::check()]);
    }

    public function downloadImage(Product $product)
    {
        $file_path = public_path('storage/' . $product->image_path);
        
        return response()->download($file_path);
    }
}
