<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProducts(){
        $products = Product::all();
        if($products){
            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully',
                'data' => $products,
            ],200,);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'No products found',
                ],404,);
        }
        
    } 

    public function getProduct(int $id){
        $product = Product::findOrFail($id);
        if($product){
            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully',
                'data' => $product,
            ],200,);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'No product found',
                ],404,);
        }
        
    } 

    public function addProduct(Request $request){
        $validate = Validator::make($request->all(),[
            'productName' => ['required'],
            'partNumber' => ['required'],
            'shelfLocation' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
        ]);

        if($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'data' => $validate->messages(),
                ],422);
        }

        $product = Product::create([
            'productName' => $request->productName,
            'partNumber' => $request->partNumber,
            'shelfLocation' => $request->shelfLocation,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        if($product){
            return response()->json([
                'success' => true,
                'message' => 'Product added successfully',
                ],201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product',
            ],500);
        }
    }

    public function updateProduct(Request $request, int $id){
         // Find the product by ID
        $product = Product::findOrFail($id);
        $validate = Validator::make($request->all(),[
            'productName' => ['sometimes', 'required'],
            'partNumber' => ['sometimes', 'required'],
            'shelfLocation' => ['sometimes', 'required'],
            'price' => ['sometimes', 'required'],
            'quantity' => ['sometimes', 'required'],
        ]);
        if($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'validation failed',
                'data' => $validate->messages()
                ],422);
        }
        // Update the product with the request data
        $product->fill($request->only([
            'productName',
            'partNumber',
            'shelfLocation',
            'price',
            'quantity'
        ]));

         // Save the updated product
         $success = $product->save();

        if($success){
            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
            ],201);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Product update failed'
            ],500);
        }

    }
    public function deleteProduct(int $id){
        $product = Product::findOrFail($id);
        $success = $product->delete();
        if($success){
            return response()->json([
                'success' => false,
                'message' => 'Product deleted successfully'
                ],201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product delete failed'
            ],500);
        }
    }


}
