<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Mail\InquiryEmail;
use Illuminate\Support\Facades\Mail;
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

    public function getAuth()
    {
        $user = Auth::user();

        return response(['user' => $user]);
    }

    public function profile()
    {
        return view('profile.page');
    }

    public function getLatestProduct()
    {
        $products = Product::orderBy('created_at', 'desc')->take(4)->get();
        // dd($products);
        return response($products);
    }

    public function getHotSellingProduct()
    {
        $products = Product::orderBy('sold_qty', 'desc')->take(4)->get();
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

    public function sendInquiry(Request $request)
    {
        $this->validate($request, [ 'contact_name' => 'required',
                                    'contact_email' => 'required|email' ]);
        
        Mail::to("info@kalt.com.my")->send(new InquiryEmail($request));
    }

    public function update(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255',
                            'address' => 'required|string|max:255',
                            'city' => 'required|string|max:255',
                            'state' => 'required|string|max:255',
                            'postcode' => 'required|string|max:255',
                            'phone' => 'required|string|max:255']);

        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->postcode = $request->postcode;
        $user->phone = $request->phone;

        if($request->password)
            $user->password = Hash::make($request->password);

        $user->save();

        return response(['data' => true]);
    }
}
