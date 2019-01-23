<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getRelatedProduct()
    {
        $product = Product::where('id', request()->id)->first();
        $filteredCategory = $product->categories()->get()->filter(function ($value, $key) {
                        return $value->type != 'brand';
                    });
        $pluckCategoryId = $filteredCategory->pluck('id')->toArray();

        if(count($pluckCategoryId) == 0)
            return response(['relatedProducts' => []]);

        $productIds = collect();
        // $product = Product::find(2);
        foreach(Product::all() as $product)
        {  
            $filteredProductCategory = $product->categories->filter(function ($value, $key) {
                        return $value->type != 'brand';
                    });
            $pluckProductCategoryId = $filteredProductCategory->pluck('id')->toArray();
            $arrayDiffResult = array_diff($pluckCategoryId,$pluckProductCategoryId);
        
            // if(count($arrayDiffResult) == 0)
            if($pluckProductCategoryId == $pluckCategoryId)
            {
                $productIds->push($product->id);
            }
        }
        $productIds = $productIds->filter(function ($value, $key) {
                        return $value != request()->id;
                    });
        $relatedProducts = Product::whereIn('id', $productIds)->take(4)->get();

        return response(['relatedProducts' => $relatedProducts]);
    }

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
    public function show(Product $product)
    {
        $product->type = $product->categories;
        return view('product.page')->with('product', $product);
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
        //
    }

    public function getCategories()
    {
        $data = array();

        $data['brand'] = Category::where('type', 'brand')->get();
        $data['type'] = Category::where('type', 'type')->get();
        $data['features'] = Category::where('type', 'features')->get();

        return response(['data' => $data]);
    }

    public function getProducts()
    {
        $data = array();
        $arrayHp = explode(',', request()->hp);

        $HpCategories = Category::with('products')
                                ->where('type', 'horsepower')
                                ->whereRaw('CONVERT(SUBSTRING_INDEX(name,"-",-1),UNSIGNED INTEGER) BETWEEN ? AND ?', 
                                            [$arrayHp[0], $arrayHp[1]])
                                ->get();

        $products = $HpCategories->pluck('products')
                                ->flatten()
                                ->pluck('id');

        if(request()->category) {
            $arrayCategory = explode(',', request()->category);

            $categories = Category::with('products')->whereIn('id', $arrayCategory)->get();

            foreach($categories->pluck('products') as $product) {
                $products = $products->intersect($product->pluck('id'));
            }

            
        }
        $totalProducts = Product::whereIn('id', $products)->count();
        $data['totalProduct'] = $totalProducts;
        $data['products'] = Product::whereIn('id', $products)
                                ->orderBy('price', request()->sort)
                                ->skip(request()->skip)
                                ->take(request()->take)
                                ->get();

        return response(['data' => $data]);
    }
}
