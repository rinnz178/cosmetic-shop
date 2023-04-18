<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $quantity = $request->input('quantity', 1);

        // Check if the user already has a cart for this product
        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();
        $product = Product::findOrFail($productId);

        // if ($product->quantity < $quantity) {
        //     return redirect()->back()->with('error', 'Sorry, the product quantity is not enough.');
        // }

        $maxQuantity = $product->quantity - ($cart ? $cart->quantity : 0);
        if ($maxQuantity < $quantity) {
            return redirect()->back()->with('error', 'Maximum Product!');
        }

        if ($cart) {
            // If the user already has a cart for this product, just update the quantity
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            // Otherwise, create a new cart item
            $cart = new Cart;
            $cart->user_id = auth()->id();
            $cart->product_id = $productId;
            $cart->quantity = $quantity;
            $cart->save();
        }
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeItem($id)
    {
        Cart::remove($id);
        return redirect()->route('cart.index')->with('success_message', 'Item has been removed!');
    }

    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }
        return view('frontend.cart', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->id);
        Cart::add($product->id, $product->name, $product->price, 1);
        return back()->with('success_message', 'Item was added to your cart!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::find($id);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return back()->with('success_message', 'Item was removed from your cart!');
    }
   
    public function checkout()
    {
        Cart::clear();
        return view('checkout.confirmation');
    }

    // public function getCartQuantity($productId)
    // {
    //     $cartItem = Cart::get($productId);
    //     $quantity = $cartItem !== null ? $cartItem->quantity : 0;
    //     $product = Product::find($productId);

    //     return response()->json([
    //         'quantity' => $quantity,
    //         'product' => $product,
    //     ]);
    // }
    // 

    public function add($id)
    {
        $product = Product::findOrFail($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => []
        ]);

        return redirect()->back()->with('success', 'Product added to cart.');
    }
}
