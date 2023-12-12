<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ArtikelDeleteEvent;
use App\Services\SummernoteService;
use App\Services\UploadService;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    private $summernoteService;
    private $uploadService;

    public function __construct(SummernoteService $summernoteService, UploadService $uploadService)
    {
        $this->summernoteService = $summernoteService;
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        $artikel = Artikel::with(['user', 'kategoriArtikel'])->get();
        return view('admin.artikel.index', compact('artikel'));
    }

    public function create()
    {
        $kategoriArtikel = KategoriArtikel::all();
        return view('admin.artikel.create', compact('kategoriArtikel'));
    }

    public function store(Request $request)
    {
        $artikel = Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $this->summernoteService->imageUpload('artikel'),
            'thumbnail' => $this->uploadService->imageUpload('artikel'),
            'slug' => Str::slug($request->judul),
            'user_id' => auth()->user()->id,
            'kategori_artikel_id' => $request->kategori_artikel_id,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Artikel $artikel)
    {
        $kategoriArtikel = KategoriArtikel::all();
        return view('admin.artikel.edit', compact('artikel', 'kategoriArtikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $this->authorize('update', $artikel);

        $artikel->update([
            'judul' => $request->judul,
            'deskripsi' => $this->summernoteService->imageUpload('artikel'),
            'thumbnail' => $this->uploadService->imageUpload('artikel'),
            'slug' => Str::slug($request->judul),
            'kategori_artikel_id' => $request->kategori_artikel_id,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Artikel $artikel)
    {
        $this->authorize('delete', $artikel);

        event(new ArtikelDeleteEvent($artikel));

        $artikel->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Data berhasil dihapus');
    }
}
