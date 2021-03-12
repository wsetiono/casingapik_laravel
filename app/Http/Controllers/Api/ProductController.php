<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ProductResource::collection(Product::all());

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
        //
    }

    public function getProductsByCategoryId($categoryId)
    {
        $productsByCategory = Product::where('category_id', $categoryId)->get();
        return ProductResource::collection($productsByCategory);
    }

    public function getProductsBySearchKeyword($searchKeyword)
    {
        
        $productsBySearchKeyword = Product::select('products.name','products.image','products.price','products.slug','products.description')
        ->where('products.name','like',"%".$searchKeyword."%")
        ->orWhere('products.description','like',"%".$searchKeyword."%")
        ->orWhere('categories.name','like',"%".$searchKeyword."%")
        ->orWhere('attribute_options.name','like',"%".$searchKeyword."%")
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('product_attribute_values', 'product_attribute_values.product_id', '=', 'products.id')
        ->leftJoin('attribute_options', 'attribute_options.id', '=', 'product_attribute_values.attribute_options_id')
        ->groupBy('products.name','products.image','products.price','products.slug','products.description')
        ->orderBy('products.created_at', 'DESC')
        ->get();

        return ProductResource::collection($productsBySearchKeyword);

    }
}
