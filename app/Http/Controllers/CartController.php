<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        //if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->image
                ]
            ];

            session()->put('cart', $cart);

            return view('cart');
            //return redirect()->back()->with('success', 'Product added to cart successfully!'); 
        }

        // if cart not empty then check if this product exist then increment quantity 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return view('cart', ['msg' => 'Product added to cart successfully!']);

            //return redirect()->back()->with('success', 'Product added to cart successfully!'); 

        }

        // if item not exist in cart then add to cart with quantity = 1 
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->image
        ];

        session()->put('cart', $cart);

        return view('cart', ['msg' => 'Product added to cart successfully!']);

         //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            return view('cart', ['msg' => 'Delete item in cart successfully!']);

            //session()->flash('success', 'Product remove successfully!');
        }
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();
            dd($cart);
            return view('cart', ['msg' => 'Cart updated successfully','total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function cart()
    {
        return view('admin.layout.cart');
    }

}
