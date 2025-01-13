<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        // Get authenticated user
        $user = Auth::guard('pelanggan')->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu!');
        }

        // Get cart items for the user
        $keranjangItems = Keranjang::with('obat')
            ->where('id_pelanggan', $user->id_pelanggan)
            ->get();

        // Calculate total
        $totalKeranjang = $keranjangItems->sum('total_keranjang');

        return view('checkout', compact('keranjangItems', 'totalKeranjang', 'user'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('pelanggan')->user();

        // Create new order
        $order = Order::create([
            'nama_order' => $request->nama,
            'email_order' => $request->email,
            'alamat_order' => $request->alamat,
            'telepon_order' => $request->telepon,
            'id_pelanggan' => $user->id_pelanggan,
            'total_order' => $request->total_order,
            'status_order' => 'Belum Bayar',
        ]);

        // Get cart items
        $keranjangItems = Keranjang::where('id_pelanggan', $user->id_pelanggan)->get();

        // Create order items from cart
        foreach ($keranjangItems as $item) {
            OrderItem::create([
                'id_pelanggan' => $user->id_pelanggan,
                'id_order' => $order->id_order,
                'id_obat' => $item->id_obat,
                'jumlah_order_item' => $item->jumlah_keranjang,
            ]);
        }

        // Clear the cart
        Keranjang::where('id_pelanggan', $user->id)->delete();

        return redirect()->route('pembayaran')->with('success', 'Order berhasil dibuat!');
    }
}
