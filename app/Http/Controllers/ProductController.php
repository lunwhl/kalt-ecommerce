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
        foreach(Product::all() as $product)
        {  
            $filteredProductCategory = $product->categories->filter(function ($value, $key) {
                        return $value->type != 'brand';
                    });
            $pluckProductCategoryId = $filteredProductCategory->pluck('id')->toArray();
            $arrayDiffResult = array_diff($pluckCategoryId,$pluckProductCategoryId);
        
            if($pluckProductCategoryId == $pluckCategoryId)
            {
                $productIds->push($product->id);
            }
        }
        $productIds = $productIds->filter(function ($value, $key) {
                        return $value != request()->id;
                    });

        $productWithBrand = Product::getProductWithBrand();

        $intersectIds = $productIds->intersect($productWithBrand->flatten()->pluck('id'));

        $relatedProducts = Product::with('categories')->whereIn('id', $intersectIds)->take(4)->get();

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
        $data['horsepower'] = Category::where('type', 'horsepower')->get();
        $data['refrigerant-gas'] = Category::where('type', 'refrigerant-gas')->get();

        return response(['data' => $data]);
    }

    public function getProducts()
    {
        $data = array();
        $arrayBTU = explode(',', request()->btu);

        $BTUCategories = Category::with('products')
                                ->where('type', 'btu')
                                ->whereRaw('CONVERT(SUBSTRING_INDEX(name,"-",-1),UNSIGNED INTEGER) BETWEEN ? AND ?', 
                                            [$arrayBTU[0], $arrayBTU[1]])
                                ->get();

        $products = $BTUCategories->pluck('products')
                                ->flatten()
                                ->pluck('id');

        if(request()->category) {
            $arrayCategory = explode(',', request()->category);

            $categories = Category::with('products')->whereIn('id', $arrayCategory)->get();

            foreach($categories->pluck('products') as $product) {
                $products = $products->intersect($product->pluck('id'));
            }
        }

        $productWithBrand = Product::getProductWithBrand();

        $intersectIds = $products->intersect($productWithBrand->flatten()->pluck('id'));

        $totalProducts = Product::whereIn('id', $intersectIds)->count();
        $data['totalProduct'] = $totalProducts;
        $data['products'] = Product::with('categories')->whereIn('id', $intersectIds)
                                ->orderBy('sequence', "ASC")
                                ->orderBy('price', request()->sort)
                                ->skip(request()->skip)
                                ->take(request()->take)
                                ->get();

        return response(['data' => $data]);
    }

    public function getSearchProducts()
    {
        $data = array();
        $keyword = '%' . request()->keyword . '%';
        $products = collect();

        $data['products'] = Product::with('categories')
                            ->where('name', 'like', $keyword)
                            ->orWhere('model', 'like', $keyword)
                            ->orWhere('specification', 'like', $keyword)
                            ->skip(request()->skip)
                            ->take(request()->take)
                            ->get();

        $data['totalProduct'] = Product::where('name', 'like', $keyword)
                            ->orWhere('model', 'like', $keyword)
                            ->orWhere('specification', 'like', $keyword)
                            ->count();

        return response(['data' => $data]);
    }
}
