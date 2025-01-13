<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminPenjualanController extends Controller
{
    public function index()
    {
        $orders = Order::with('payment')->get();
        return view('admin.penjualan.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('payment')->findOrFail($id);
        return view('admin.penjualan.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('penjualan.index')->with('success', 'Order deleted successfully.');
    }

    public function konfirmasi(Request $request)
    {
        $order = Order::findOrFail($request->id_order);
        $order->status_order = 'Confirmed';
        $order->save();

        return response()->json(['success' => true]);
    }

    public function tolak(Request $request)
    {
        $order = Order::findOrFail($request->id_order);
        $order->status_order = 'Rejected';
        $order->save();

        return response()->json(['success' => true]);
    }
}
