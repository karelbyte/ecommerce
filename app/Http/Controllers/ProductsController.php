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

           if ($request->hasFile('media')) {
               $product->addMedia($request->file('media'))->toMediaCollection('medias');
           }

           return response()->json('Producto almacenado con exito!');

       } catch (\Exception $e) {

         return response()->json($e->getMessage(), 500 );

       }
    }

    public function update(Request $request, $id) {
        try
        {
           Product::query()->where('id', $id)->update($request->all());

           /* if ($request->hasFile('media')) {

                $product = Product::find($id);

                $media = $product->getMedia('medias');

                $media[0]->delete();

                $product->addMedia($request->file('media'))->toMediaCollection('medias');
            }*/

            return response()->json(Product::find($id));

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 500 );

        }
    }

    public function destroy($id) {

        Product::find($id)->delete();

        return response()->json('Producto eliminado con exito!');

    }
}
