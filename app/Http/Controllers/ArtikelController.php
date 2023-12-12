<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with(['user', 'kategoriArtikel'])
            ->latest()
            ->paginate(4);

        return view('artikel.index', compact('artikel'));
    }

    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $artikel = Artikel::with(['user', 'kategoriArtikel'])
            ->where('judul', 'like', '%' . $keyword . '%')
            ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
            ->paginate(4);

        return view('artikel.index', compact('artikel'));
    }
}
