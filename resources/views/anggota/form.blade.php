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
                <form action="{{route('anggota.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode">kode</label>
                            <input type="text" name="kode" class="form-control" id="inputEmail4" placeholder="Kode">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="nama" name="nama" class="form-control" id="inputPassword4" placeholder="Nama">
                        </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="nama">Kelamin</label>
                            <select id="inputState" name="jenis_kelamin" class="form-control">
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Alamat</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="inputAddress2"
                                placeholder="darjo po?">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="inputCity">
                        </div>

                        
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telepon">telepon</label>
                            <input type="number" name="telepon" class="form-control" id="inputCity">
                        </div>

                    <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" textarea name="alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="foto">foto</label>
                        <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">OK</button>

                </form>
        
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
