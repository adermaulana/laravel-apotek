<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class AdminPemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemasok.index', [
            'data_pemasok' => Pemasok::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ]);

        Pemasok::create([
            'id_admin' => $request->id_admin,
            'nama_pemasok' => $request->nama_pemasok,
            'alamat_pemasok' => $request->alamat,
            'telepon_pemasok' => $request->telepon,
        ]);

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasok $pemasok)
    {
        return view('admin.pemasok.edit', [
            'pemasok' => $pemasok,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasok $pemasok)
    {
        $request->validate([
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ]);

        $pemasok->update([
            'id_admin' => $request->id_admin,
            'nama_pemasok' => $request->nama_pemasok,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasok $pemasok)
    {
        // Hapus data dari database
        $pemasok->delete();

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil dihapus.');
    }
}
