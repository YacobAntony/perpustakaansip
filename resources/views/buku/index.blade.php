@extends('layout.app')
@section('title', 'buku')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Buku</h1>
    </div>

    <div class="section-body">
        <div class="card">

            <div class="card-header">
                <h4>data Buku</h4>
                <div class="card-header-form">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter"><i
                            class="fas fa-plus"></i>Tambah data </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id = "table-buku">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">kode</th>
                            <th scope="col">judul</th>
                            <!-- <th scope="col">tempat lahir</th>
                          <th scope="col">tanggal lahir</th> -->
                            <th scope="col">penerbit</th>
                            <th scope="col">stok</th>
                            <th scope="col">gambar</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td
                                style="text-align: center;">
                                {!! DNS1D::getBarcodeHTML('$ ' . $item->buku, 'C39', 1, 25) !!}
                                    <div style="margin-top: 5px;">{{$item->kode}}</div>
                            </td>
                            <td>{{$item->judul}}</td>
                            <!-- <td>{{$item->tempat_lahir}}</td>
                            <td>{{$item->tanggal_lahir}}</td> -->
                            <td>{{$item->penerbit->nama}}</td>
                            <td>{{$item->stok}}</td>
                            <td><img src="{{asset('/storage/buku/'.$item->gambar)}}" alt="{{$item->gambar}}"
                                    style="width: 150px"></td>
                            
                            <td>


                                <form action="/buku/{{$item->id}}" style="display : inline;" method="POST" id="delete-form">
                                    @csrf
                                    @method('delete')
                                    
                                    <button type="submit" class="btn btn-sm btn-danger" data-id="{{$item->id}}"
                                        onclick="confirmDelete(this)"><i class="fa fa-trash"></i>hapus</button>
                                        <a class="btn btn-sm btn-warning" href="/buku/{{$item->id}}/edit">Edit</a>

                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>
@include('buku.form')
@endsection


@push('script')
<script>
    
    @if(session('sukses'))
    iziToast.success({
      title:'Sukses', 
      message: '{{session('sukses')}}',
      position: 'topRight'
    });
    @endif

 
    var data_buku = $(this).attr('data-id')
    function confirmDelete(button) {
    
        event.preventDefault()
        const id = button.getAttribute('data-id');
        swal({
                title: 'Apa Anda Yakin ?',
                text: 'Anda akan menghapus ID: ' + id + '. Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
              const form = document.getElementById('delete-form');
              // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
              form.action = '/buku/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
    
       $(document).ready( function () {
    $('#table-buku').DataTable()
     } );
</script>
@endpush