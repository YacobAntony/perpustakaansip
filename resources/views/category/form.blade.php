

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action = "{{route('kategori.store')}}" method="POST">
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Kode</label>
    <input type="text" name="kode" class="form-control" id="exampleInputEmail1" placeholder="Ketikan Sesuatu">
    <small id="" >Kode sembarang</small>
<tr>
    <label for="exampleInputEmail2">Nama</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail2" placeholder="Ketikan Sesuatu">
    <small id="" >Nama sembarang</small>
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>