@extends('layout.app')

@section('title', 'Edit Data Buku')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Buku</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Buku</h4>
            </div>
            <div class="card-body">
            <form action="/buku/{{$buku->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode">kode</label>
                            <input type="text" name="kode" class="form-control" id="inputEmail4" value="{{$buku->kode}}"
                             placeholder="Kode">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="inputPassword4" value="{{$buku->judul}}"
                            placeholder="Judul">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="kategori_id">Kategori</label>
                            <select id="inputState" name="kategori" class="form-control">
                                @foreach ($kategori as $basing)
                                <option value="{{$basing->id}}" {{$basing->id == $buku->kategori_id ? 'selected' : ''}}>{{$basing->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="penerbit_id">Penerbit</label>
                            <select id="inputState" name="penerbit" class="form-control">
                                @foreach ($penerbit as $moking)
                                <option value="{{$moking->id}}"{{$moking->id == $buku->penerbit_id ? 'selected' : ''}}>{{$moking->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="isbn">isbn</label>
                            <input type="number" name="isbn" class="form-control" id="inputPassword4" value="{{$buku->isbn}}"
                                placeholder="isbn">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" id="inputCity" value="{{$buku->pengarang}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jumlah_halaman">jumlah halaman</label>
                            <input type="number" name="jumlah_halaman" class="form-control" id="inputCity" value="{{$buku->jumlah_halaman}}"> 
                        </div>

                        <div class="form-group col-md-6">
                            <label for="stok">stok</label>
                            <input type="number" class="form-control" name="stok" value="{{$buku->stok}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tahun_terbit">tahun terbit</label>
                            <input type="date" class="form-control" name="tahun_terbit" id="exampleFormControlFile1" value="{{$buku->tahun_terbit}}">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Sinopsis</label>
                        <textarea class="form-control" textarea name="sinopsis">{{$buku->sinopsis}}</textarea>
                         </div>

                        <div class="form-group col-md-6">
                        <label for="gambar">Foto</label>
                                <img src="{{ asset('/storage/buku/'.$buku->gambar) }}" class="rounded" style="width: 150px">
                                <input type="file" class="form-control-file" name="gambar">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">OK</button>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection

