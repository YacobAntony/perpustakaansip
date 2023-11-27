<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;



class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $anggota = new Anggota;

        $foto = $request->file('foto');
        $foto->storeAs('public/anggota', $foto->hashName());
        Anggota::create([


    'kode' => $request->kode,
    'nama' => $request->nama,
    'jenis_kelamin' => $request->jenis_kelamin,
    'tempat_lahir' => $request->tempat_lahir,
    'tanggal_lahir' => $request->tanggal_lahir,
    'telepon' => $request->telepon,
    'alamat' => $request->alamat,
    'foto' => $foto->hashName()
    
    ]);
        return redirect('anggota')->with('sukses', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);

        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $anggota = Anggota::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/anggota/',$foto->hashName());

           
            $anggota->update([
                'kode' => $request->kode,
                'nama' =>  $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'foto' => $foto->hashName()
            ]);
        } else {
            $anggota->update([
                'kode' => $request->kode,
                'nama' =>  $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
            ]);
        }


        return redirect('anggota')->with('sukses', 'Data berhasil di update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect('anggota')->with('sukses', 'Data berhasil di hapus');
    }
}