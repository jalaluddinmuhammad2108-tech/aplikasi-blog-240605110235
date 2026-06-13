<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;

class PengunjungController extends Controller
{
    /**
     * Halaman utama pengunjung
     */
    public function index()
    {
        $artikel = Artikel::with(['kategori', 'penulis'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view('pengunjung.index', compact('artikel', 'kategori'));
    }

    /**
     * Filter artikel berdasarkan kategori
     */
    public function kategori($id)
    {
        $kategoriAktif = KategoriArtikel::findOrFail($id);

        $artikel = Artikel::with(['kategori', 'penulis'])
            ->where('id_kategori', $id)
            ->orderBy('id', 'desc')
            ->get();

        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view('pengunjung.index', compact(
            'artikel',
            'kategori',
            'kategoriAktif'
        ));
    }

    /**
     * Detail artikel
     */
    public function detail($id)
    {
        $artikel = Artikel::with(['kategori', 'penulis'])
            ->findOrFail($id);

        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        $artikelTerkait = Artikel::where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('pengunjung.detail', compact(
            'artikel',
            'kategori',
            'artikelTerkait'
        ));
    }
}