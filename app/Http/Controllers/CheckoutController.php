<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\OrderProduct;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;


class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Retrieve the authenticated user
        $user_id = auth()->user()->id;
        $cartItems = Cart::where('user_id', $user_id)->get();
        // Retrieve the products in the cart
        $products = Product::whereIn('id', array_keys($request->session()->get('cart', [])))->get();

        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->product->price * $cartItem->quantity;
        }

        $updatedQuantity = session('updatedQuantity');

        // Create a new order
        $order = new Order();
        $order->user_id = $user_id;
        $order->name = $name = auth()->user()->name;
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->total_price = $request->input('total_price');

        $order->save();

        // Loop through the products in the cart
        foreach ($cartItems as $cartItem) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price
            ]);
        }

        // Clear the cart

        // Update the total price of the order
        // $order->total_price = $totalPrice;
        $order->save();
        // Clear the cart
        Cart::where('user_id', $user_id)->delete();
        // Send an SMS message to the phone number provided in the checkout form
        $sid = 'AC7c591ae5d9037dc80a8876e6bb3551ea';
        $token = '3f8980173813d688bdbfae533d06c74b';
        $twilioPhone = '+15075095370';
        $client = new Client($sid, $token);
        $message = $client->messages->create(
            $request->input('phone'),
            [
                "messagingServiceSid" => "MG768c9c61980ac96aa1466b339fd29dc0",
                'body' => 'Your order has been received. Thank you for your purchase!',
            ]
        );
        // Redirect to the order confirmation page
        $request->session()->flash('success', 'Order successful!');

        return redirect()->back();
    }
}
