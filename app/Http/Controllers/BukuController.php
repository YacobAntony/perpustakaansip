<?php

namespace App\Http\Controllers;
use App\Models\buku;
use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();

        return view('buku.index', compact('buku','kategori','penerbit'));
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
          $buku = new Buku;

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/buku', $gambar->hashName());
        Buku::create([


        'kode' => $request->kode,
        'judul' => $request->judul,
        'kategori_id' => $request->kategori,
        'penerbit_id' => $request->penerbit,
        'isbn' => $request->isbn,
        'pengarang' => $request->pengarang,
        'jumlah_halaman' => $request->jumlah_halaman,
        'stok'=> $request->stok,
        'tahun_terbit'=> $request->tahun_terbit,
        'sinopsis' => $request->sinopsis,
        'gambar' => $gambar->hashName()
    
    ]);
        return redirect('buku')->with('sukses', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();

        return view('buku.edit', compact('buku','kategori','penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $buku = Buku::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/buku/',$gambar->hashName());

           
            $buku->update([
        'kode' => $request->kode,
        'judul' => $request->judul,
        'kategori_id' => $request->kategori,
        'penerbit_id' => $request->penerbit,
        'isbn' => $request->isbn,
        'pengarang' => $request->pengarang,
        'jumlah_halaman' => $request->jumlah_halaman,
        'stok'=> $request->stok,
        'tahun_terbit'=> $request->tahun_terbit,
        'sinopsis' => $request->sinopsis,
        'gambar' => $gambar->hashName()
            ]);
        } else {
            $buku->update([
                'kode' => $request->kode,
                'judul' => $request->judul,
                'kategori_id' => $request->kategori,
                'penerbit_id' => $request->penerbit,
                'isbn' => $request->isbn,
                'pengarang' => $request->pengarang,
                'jumlah_halaman' => $request->jumlah_halaman,
                'stok'=> $request->stok,
                'tahun_terbit'=> $request->tahun_terbit,
                'sinopsis' => $request->sinopsis,
            ]);
        }


        return redirect('buku')->with('sukses', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('buku')->with('sukses', 'Data berhasil di hapus');
    }
}
