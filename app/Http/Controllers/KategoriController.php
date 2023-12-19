<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Buku;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('buku.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategoris|max:255',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        Kategori::create([
            'nama' => $request->nama,
            // tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:kategoris,nama,' . $id . '|max:255',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
            // tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }

    public function bukuByKategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        $bukus = $kategori->bukus;

        return view('kategori.buku', compact('kategori', 'bukus'));
    }
}
