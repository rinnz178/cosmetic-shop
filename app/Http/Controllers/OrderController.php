<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function confirmation(Order $order)
    {
        return view('order.confirmation', compact('order'));
    }
}
