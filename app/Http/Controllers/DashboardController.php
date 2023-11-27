<?php

namespace App\Http\Controllers;
use App\Models\penerbit;
use App\Models\dashboard;
use App\Models\anggota;
use App\Models\kategori;
use App\Models\buku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      //  $kategori = Kategori::all();
        $anggota = Anggota::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $buku = buku::all();
        
        return view('dashboard.index', compact('anggota','kategori','penerbit','buku'));
    }

}
