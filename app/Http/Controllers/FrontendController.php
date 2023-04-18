<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        // return view('frontend.home');
        // dd(Auth::user());

        //     $newProducts = Product::latest()->limit(4)->get();
        //     $features = Product::inRandomOrder()->limit(3)->get();
        //     return view('frontend.home', compact('features', 'newProducts'));
        //
    }

    public function featureProduct()
    {
        // dd(Auth::user());
        $title = "Home Page";
        $cartItemCount = Cart::where('user_id', auth()->id())->sum('quantity');

        $newProducts = Product::latest()->limit(4)->get();
        $features = Product::inRandomOrder()->limit(3)->get();
        return view('frontend.home', compact('features', 'newProducts', 'cartItemCount', 'title'));
    }

    public function shop(Request $request)
    {
        $category_id = $request->input('category_id');
        if ($category_id) {
            $category = Category::findOrFail($category_id);
            $products = Product::where('category_id', $category_id)->get();
        } else {
            $category = null;
            $products = Product::all();
        }

        $categories = Category::all();
        return view('frontend.shop', compact('products', 'category', 'categories'));
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function showProductsByCategory($id)
    {
        $category = Category::findOrFail($id);
        $filterProducts = Product::where('category_id', $id)->get();

        return view('frontend.shop', compact('filterProducts', 'category'));
    }
    public function productDetail($id)
    {
        $productDetail = Product::find($id);
        $productQuantity = $productDetail->quantity;
        return view('frontend.productDetail', ['product' => $productDetail, 'productQuantity' => $productQuantity,]);
    }

    // public function like($id)
    // {
    //     $user = auth()->user();
    //     $product = Product::find($id);

    //     // Check if the user has already liked the product
    //     if ($user->hasLiked($product)) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'You have already liked this product'
    //         ]);
    //     }

    //     $user->likes()->attach($product->id);
    //     $product->likes++;
    //     $product->save();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Product has been liked successfully'
    //     ]);
    // }

    // public function unlike($id)
    // {
    //     $product = Product::findOrFail($id);

    //     if (!auth()->user()->hasLiked($product)) {
    //         return response()->json(['message' => 'You have not liked this product.']);
    //     }

    //     $like = $product->likes()->where('user_id', auth()->id())->first();
    //     $like->delete();

    //     return response()->json(['message' => 'Product unliked.']);
    // }
}
