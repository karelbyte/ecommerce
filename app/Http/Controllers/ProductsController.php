<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index() {
        $product = Product::query()->find(6);
        return response()->json($product->getMedia()->getUrl()); //ProductResource::collection();
    }


    public function store(Request $request) {
       try
       {
           $product = Product::query()->create($request->all());

           $product->addMedia($request->file('media'))->toMediaCollection();;

           return response()->json('Producto almacenado con exito!');

       } catch (\Exception $e) {

         return response()->json($e->getMessage(), 500 );

       }
    }
}
