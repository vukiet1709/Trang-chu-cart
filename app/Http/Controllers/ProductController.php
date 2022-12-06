<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create',['categories' => $categories]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'imageProduct' => 'required|image|mimes:jpg,jpeg,png|max:10000',
                'price' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('imageProduct')) {
                $file = $request->file('imageProduct');
                $path = public_path('image/product');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            } else {
                $fileName = 'noname.jpg';
            }
            $newProduct = new Product();
            $newProduct->product_name = $request->name;
            $newProduct->product_price = $request->price;
            $newProduct->product_description = $request->description;
            $newProduct->img =  $fileName;
            $newProduct->category_id = $request->category;
            $newProduct->save();
            return redirect()->route('products.index')
                ->with('success', 'Product created successfully.');
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::with('category') -> find($id);
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $fileName="";
            if ($request->hasFile('imageProduct')) {
                $file = $request->file('imageProduct');
                $path = public_path('image/product');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
            $product = Product::find($id);
            if ($product != null) {                
                $product->product_name = $request->name;
                $product->product_price = $request->price;
                $product->product_description = $request->description;
               

                if ($fileName) {
                    $product->img = $fileName;
                }
                $product->save();
                return redirect()->route('products.index')
                ->with('success', 'Product updated successfully');
                $product->category_id = $request->category;
            } 
            else
            {
                return redirect()->route('products.index')
                ->with('Error', 'Product not update');
            }         
        }       
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $image_path = "/image/product/.$product->image";  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
