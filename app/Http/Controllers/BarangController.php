<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Tampilkan daftar semua barang.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }

    /**
     * Tampilkan form tambah barang.
     */
    public function create()
    {
        return view('admin.barang.create');
    }

    /**
     * Simpan barang baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'kondisi' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        Barang::create($validated);

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit barang.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barang'));
    }

    /**
     * Proses update barang.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'kondisi' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($validated);

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Hapus data barang.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus.');
    }

    /**
     * Opsional: Tampilkan detail barang jika dibutuhkan.
     * Tapi jika tidak digunakan, tetap ada agar route resource tidak error.
     */
    public function show($id)
    {
        // Jika tidak digunakan, redirect saja
        return redirect()->route('admin.barang.index');
    }
}