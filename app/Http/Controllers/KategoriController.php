<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('category.index', compact ('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $category = new kategori;
        $category-> kode = $request->kode;
        $category-> nama = $request->nama;
        $category-> save();

        return redirect('kategori')->with('sukses', 'data disimpan') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = kategori::find($id);

        return view ('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = kategori::find($id);
        $category-> kode = $request->kode;
        $category-> nama = $request->nama;
        $category-> update();

        return redirect('kategori')->with('sukses', 'data disimpan') ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = kategori :: find($id);
        $category->delete();

        return redirect('kategori')->with('sukses', 'data dihapus') ;


    }
}
