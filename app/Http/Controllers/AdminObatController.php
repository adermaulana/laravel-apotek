<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class AdminObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.obat.index', [
            'data_obat' => Obat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048', // Validasi gambar (opsional)
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName(); // Buat nama unik
            $file->move(public_path('uploads/'), $filename); // Pindahkan file ke folder public/uploads/obat
            $path = 'uploads/' . $filename; // Simpan path file untuk disimpan di database
        }

        // Simpan data ke database
        Obat::create([
            'nama_obat' => $request->nama_obat,
            'deskripsi_obat' => $request->deskripsi,
            'harga_obat' => $request->harga,
            'gambar_obat' => $path,
        ]);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan.');
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
        return view('admin.obat.edit', [
            'obat' => $obat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048', // Validasi gambar (opsional)
        ]);

        // Siapkan data untuk update
        $updateData = [
            'nama_obat' => $request->nama_obat,
            'deskripsi_obat' => $request->deskripsi,
            'harga_obat' => $request->harga,
        ];

        // Handle upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName(); // Buat nama unik
            $file->move(public_path('uploads/'), $filename); // Pindahkan file ke folder public/uploads/
            $updateData['gambar_obat'] = 'uploads/' . $filename;

            // Hapus gambar lama jika ada
            if ($obat->gambar_obat && file_exists(public_path($obat->gambar_obat))) {
                unlink(public_path($obat->gambar_obat));
            }
        }

        // Update data di database
        $obat->update($updateData);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        // Hapus gambar jika ada
        if ($obat->gambar_obat && file_exists(public_path($obat->gambar_obat))) {
            unlink(public_path($obat->gambar_obat));
        }

        // Hapus data dari database
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus.');
    }
}
