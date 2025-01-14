<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('obat', [
            'obat' => Obat::paginate(10),
        ]);
    }

    public function detail($id)
    {
        $obat = Obat::findOrFail($id);

        return view('detail_obat', compact('obat'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'id_obat' => 'required|exists:data_obat,id_obat',
            'jumlah' => 'required|integer|min:1',
        ]);

        $obat = Obat::findOrFail($request->id_obat);
        $jumlahPembelian = $request->jumlah;

        if ($jumlahPembelian > $obat->stok_obat) {
            return redirect()->back()->with('error', 'Jumlah obat yang dibeli melebihi stok yang tersedia.');
        }

        // Kurangi stok
        $obat->stok_obat -= $jumlahPembelian;
        $obat->save();

        // Check apakah produk sudah ada di keranjang
        $keranjang = Keranjang::where('id_obat', $obat->id_obat)
            ->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->first();

        if ($keranjang) {
            // Update jumlah dan total harga
            $keranjang->jumlah_keranjang += $jumlahPembelian;
            $keranjang->total_keranjang = $keranjang->jumlah_keranjang * $obat->harga_obat;
            $keranjang->save();
        } else {
            // Buat item baru di keranjang
            Keranjang::create([
                'id_obat' => $obat->id_obat,
                'id_pelanggan' => Auth::guard('pelanggan')->id(),
                'harga_keranjang' => $obat->harga_obat,
                'jumlah_keranjang' => $jumlahPembelian,
                'total_keranjang' => $obat->harga_obat * $jumlahPembelian,
            ]);
        }

        return redirect()->route('keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function keranjang()
    {
        if (!Auth::guard('pelanggan')->check()) {
            return redirect('login')->with('loginError', 'Silakan login terlebih dahulu untuk mengakses keranjang.');
        }

        $id_pelanggan = Auth::guard('pelanggan')->id(); // Mendapatkan ID pelanggan yang login
        $keranjangItems = Keranjang::with('obat')->where('id_pelanggan', $id_pelanggan)->get();

        $totalKeranjang = $keranjangItems->sum('total_keranjang');

        return view('keranjang', compact('keranjangItems', 'totalKeranjang'));
    }

    public function hapusKeranjang($id)
    {
        try {
            $keranjangItem = Keranjang::findOrFail($id);

            // Restore the stock before deleting
            $obat = Obat::findOrFail($keranjangItem->id_obat);
            $obat->stok_obat += $keranjangItem->jumlah_keranjang;
            $obat->save();

            // Delete the cart item
            $keranjangItem->delete();

            return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang.');
        } catch (\Exception $e) {
            return redirect()->route('keranjang')->with('error', 'Terjadi kesalahan saat menghapus produk dari keranjang.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        //
    }
}
