<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
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

    public function like($id)
    {
        $product = Product::find($id);

        if (!Auth::user()->hasLike($product)) {
            $product->likes++;
            $product->likedBy(Auth::user());
        }

        return redirect()->back();  
    }

    public function unlike($id)
    {
        $product = Product::find($id);
        $product->likes--;
        $product->save();

        return redirect()->back();
    }
}
