<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Penulis;



class ArtikelController extends Controller
{
    //
    public function index()
    {
        $artikel = Artikel::with('penulis', 'kategori')->orderBy('id', 'desc')->get();
        return view('artikel.index', compact('artikel'));
    }

    //
    public function create()
    {
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        return view('artikel.create', compact('kategori'));
    }
    //
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('gambar');
        $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('gambar', $namaFile, 'public');

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_penulis' => Auth::user()->id,
            'id_kategori' => $request->id_kategori,
            'gambar' => $namaFile,
            'hari_tanggal' => now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM Y | HH:mm'),
        ]);
        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        return view('artikel.edit', compact('artikel', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_kategori' => $request->id_kategori,
        ];

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete('gambar/' . $artikel->gambar);
            $file = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('gambar', $namaFile, 'public');
            $data['gambar'] = $namaFile;
        }
        $artikel->update($data);


        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        try {
            Storage::disk('public')->delete('gambar/' . $artikel->gambar);
            $artikel->delete();
            return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('artikel.index')->with('gagal', 'Artikel gagal dihapus.');
        }
    }
}
