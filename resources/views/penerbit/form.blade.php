

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action = "{{route('penerbit.store')}}" method="POST">
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Kode</label>
    <input type="text" name="kode" class="form-control" id="exampleInputEmail1" placeholder="Ketikan Sesuatu">
    <small id="" ></small>
<tr></div>
<div class="form-group">
    <label for="exampleInputEmail2">Nama</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail2" placeholder="Ketikan Sesuatu">
    <small id="" ></small>
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>