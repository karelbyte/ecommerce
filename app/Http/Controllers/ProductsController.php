<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index() {
        $products = Product::with('media')->get();
        return ProductResource::collection($products);
    }


    public function store(Request $request) {
       try
       {
           $product = Product::query()->create($request->all());

           $product->addMedia($request->file('media'))->toMediaCollection('medias');

           return response()->json('Producto almacenado con exito!');

       } catch (\Exception $e) {

         return response()->json($e->getMessage(), 500 );

       }
    }
}
