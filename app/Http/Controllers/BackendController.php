<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function dashboard()
    {
        $pendingOrders = Order::where('status', 'pending')->get();
        $todayOrders = Order::whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->take(5)->get();
        $order = Order::with('orderProducts')->latest()->first();
        $doneOrdersCount = Order::where('status', 'done')->count();
        $pendingOrdersCount = Order::where('status', 'pending')->count();
        $productCount = Product::count();
        $categoryCount = Category::count();

        $chartData = [
            'Orders' => Order::where('status', 'pending')->count(),
            'Sales' => Order::where('status', 'done')->count(),
        ];

        return view(
            'backend.dashboard',
            compact(
                'pendingOrders',
                'chartData',
                'todayOrders',
                'order',
                'doneOrdersCount',
                'pendingOrdersCount',
                'productCount',
                'categoryCount'
            )
        );


        // $pendingOrders = Order::where('status', 'pending')->get();
        // return view('backend.dashboard', ['pendingOrders' => $pendingOrders, 'chartData' => $chartData]);
    }
    public function orderNew()
    {
        // Retrieve all orders with their order products
        $orders = Order::with('orderProducts')->get();
        $doneOrders = Order::where('status', 'pending')->get();

        // dd($orders);
        // Return the orders to a view
        return view('backend.order.index', ['orders' => $orders, 'doneOrders' => $doneOrders])->with('i', (request()->input('page', 1) - 1) * 5);;
    }
    public function sales()
    {
        // Retrieve all orders with their order products
        $orders = Order::with('orderProducts')->get();
        $doneOrders = Order::where('status', 'done')->get();

        // dd($orders);
        // Return the orders to a view
        return view('backend.order.sale', ['orders' => $orders, 'doneOrders' => $doneOrders])->with('i', (request()->input('page', 1) - 1) * 5);;
    }
    public function show($id)
    {

        $order = Order::with('orderProducts')->find($id);
        $totalPrice = $order->total_price + $order->orderProducts()->sum('price');

        $i = 1;
        return view('backend.order.show', compact('i', 'order', 'totalPrice'));
    }
    public function card($id)
    {
        $order = Order::with('orderProducts')->find($id);
        // $totalPrice = $order->total_price + $order->orderProducts()->sum('price');

        $i = 1;
        // Return the order to a view
        return view('backend.order.card', ['order' => $order]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('backend.order.index')
            ->with('success', 'Order deleted successfully');
    }

    public function export($id)
    {
        // Load the order data
        $order = Order::find($id);

        // Render the order-pdf view with the order data
        $html = View::make('backend.order.card', compact('order'))->render();
        $css = file_get_contents(public_path('backend/assets/css/style.css'));
        // Create a new Dompdf instance
        $pdf = new Dompdf();
        $pdf->loadHtml($css);

        // Load  HTML content
        $pdf->loadHtml($html);

        // Render the PDF document
        $pdf->render();

        // Return the PDF as a download
        return $pdf->stream('order_' . $order->name . '_'  . '.pdf');
    }

    public function update(Request $request, Order $order)
    {
        $order->status = $request->input('status');
        $order->save();
        return redirect()->back()->with('success', 'Order status has been updated!');
    }

    public function pieChart()
    {
        $data = DB::table('orders')
            ->select(DB::raw('status, count(*) as count'))
            ->groupBy('status')
            ->get();

        $statuses = $data->pluck('status');
        $counts = $data->pluck('count');

        $chartData = [
            'labels' => $statuses,
            'datasets' => [
                [
                    'data' => $counts,
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56'
                    ]
                ]
            ]
        ];

        return view('pie-chart', compact('chartData'));
    }
}
