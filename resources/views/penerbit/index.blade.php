@extends('layout.app')
@section('title', 'penerbit')
@section('content')



<section class="section">
    <div class="section-header">
        <h1>Penerbit</h1>
    </div>

    <div class="section-body">
        <div class="card">


            <div class="card-header">
                <h4>data penerbit</h4>
                <div class="card-header-form">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter"><i
                            class="fas fa-plus"></i>Tambah data </button>
                </div>


            </div>
            <div class="card-body">
                <table class="table table-hover" id="table-penerbit">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penerbit as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>|

                                <!-- <a href="/penerbit/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a> -->

                             

                         <form action="/penerbit/{{$item->id}}" style="display : inline;" method="POST" id="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" data-id="{{$item->id}}"
                                        onclick="confirmDelete(this)"><i class="fa fa-trash"></i>hapus</button>
                                        <a href="/penerbit/{{$item->id}}/edit">Edit</a>
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

@include('penerbit.form')
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

 
    var data_penerbit = $(this).attr('data-id')
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
              form.action = '/penerbit/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
    
</script>
<script>
       $(document).ready( function () {
    $('#table-penerbit').DataTable()
     } );
</script>
@endpush