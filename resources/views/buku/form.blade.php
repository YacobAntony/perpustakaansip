<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="modal-dialog modal-dialog-centered" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <form action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode">kode</label>
                            <input type="text" name="kode" class="form-control" id="inputEmail4" placeholder="Kode">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="inputPassword4"
                                placeholder="Judul">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="kategori_id">Kategori</label>
                            <select id="inputState" name="kategori" class="form-control">
                                @foreach ($kategori as $basing)
                                <option value="{{$basing->id}}">{{$basing->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="penerbit_id">Penerbit</label>
                            <select id="inputState" name="penerbit" class="form-control">
                                @foreach ($penerbit as $moking)
                                <option value="{{$moking->id}}">{{$moking->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="isbn">isbn</label>
                            <input type="number" name="isbn" class="form-control" id="inputPassword4"
                                placeholder="isbn">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" id="inputCity">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jumlah_halaman">jumlah halaman</label>
                            <input type="number" name="jumlah_halaman" class="form-control" id="inputCity">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="stok">stok</label>
                            <input type="number" class="form-control-file" name="stok" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tahun_terbit">tahun terbit</label>
                            <input type="date" class="form-control-file" name="tahun_terbit" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Sinopsis</label>
                        <textarea class="form-control" textarea name="sinopsis"></textarea>
                         </div>

                        <div class="form-group col-md-6">
                            <label for="gambar">gambar</label>
                            <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">OK</button>

                </form>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
