<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $category = Category::all();
        return view('productadd',compact('category'));
    }

    public function storeProduct(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create a new product instance
        $product = new Product([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'category_id' => $validatedData['category_id'],
        ]);

        // Save the product to the database
         $product->save();
         return redirect()->route('product.list');
    }

    public function listProduct(Request $request){
        $query = Product::query();
        $category = Category::all();

        if($request->ajax()){
            if(empty($request->category)){
                $products=$query->get();
            }else{
                $products = $query->where(['category_id'=>$request->category])->get();
            }

          return response()->json(['products'=>$products]);

        }
        $products=$query->get();
        return view('productlist',compact('products','category'));
    }
}
