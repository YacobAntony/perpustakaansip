<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact ('penerbit'));
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
        $penerbit = new penerbit;
        $penerbit-> kode = $request->kode;
        $penerbit-> nama = $request->nama;
        $penerbit-> save();

        return redirect('penerbit')->with('sukses', 'data disimpan') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penerbit = penerbit::find($id);

        return view ('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $penerbit = penerbit::find($id);
        $penerbit-> kode = $request->kode;
        $penerbit-> nama = $request->nama;
        $penerbit-> update();

        return redirect('penerbit')->with('sukses', 'data disimpan') ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penerbit = penerbit :: find($id);
        $penerbit->delete();

        return redirect('penerbit')->with('sukses', 'data dihapus') ;


    }
}
