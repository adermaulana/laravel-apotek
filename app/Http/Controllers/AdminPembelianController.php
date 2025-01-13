<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Obat;
use App\Models\Pemasok;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::with(['obat', 'pemasok'])->get();
        return view('admin.pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obat = Obat::all();
        $pemasok = Pemasok::all();
        $admin = auth()->user();
        return view('admin.pembelian.create', compact('obat', 'pemasok', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'obat_id' => 'required',
            'id_pemasok' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'harga_total' => 'required|numeric',
        ]);

        DB::transaction(function () use ($request) {
            // Update stok obat
            $obat = Obat::findOrFail($request->obat_id);
            $obat->stok_obat += $request->jumlah;
            $obat->save();

            // Simpan data pembelian
            Pembelian::create([
                'id_obat' => $request->obat_id,
                'id_pemasok' => $request->id_pemasok,
                'harga_pembelian' => $request->harga,
                'jumlah_pembelian' => $request->jumlah,
                'tanggal_pembelian' => date('Y-m-d'),
                'total_pembelian' => $request->harga_total,
                'id_admin' => auth()->id(),
            ]);
        });

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus!');
    }
}
