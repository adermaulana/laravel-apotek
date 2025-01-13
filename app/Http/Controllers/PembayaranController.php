<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        if (!Auth::guard('pelanggan')->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu!');
        }

        $orders = Order::where('id_pelanggan', Auth::guard('pelanggan')->id())->orderBy('id_order', 'DESC')->get();

        return view('pembayaran', compact('orders'));
    }

    public function konfirmasi($id)
    {
        $order = Order::findOrFail($id);

        if ($order->id_pelanggan !== Auth::guard('pelanggan')->id()) {
            return redirect()->route('pembayaran.index')->with('error', 'Unauthorized access');
        }

        return view('konfirmasi', compact('order'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_order' => 'required|exists:data_order,id_order',
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('bukti_pembayaran');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);

        Payment::create([
            'id_order' => $validated['id_order'],
            'total_pembayaran' => $request->total_bayar,
            'foto_pembayaran' => 'uploads/' . $filename,
        ]);

        Order::where('id_order', $validated['id_order'])->update(['status_order' => 'Proses']);

        return redirect()->route('pembayaran')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
