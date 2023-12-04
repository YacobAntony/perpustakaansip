<!-- @extends('layout.app')
@section('title', 'category')
@section('content')



<section class="section">
    <div class="section-header">
        <h1>Kategori</h1>
    </div>

    <div class="section-body">
        <div class="card">


            <div class="card-header">
                <h4>data kategori</h4>
                <div class="card-header-form">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter"><i
                            class="fas fa-plus"></i>Tambah data </button>
                </div>


            </div>
            <div class="card-body">
                <table class="table table-hover" id="table-category">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>|

                                <!-- <a href="/kategori/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a> -->

                                <!-- <form action="/kategori/{{$item->id}}/edit" style="display : inline;">
                                    <button type="submit" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i>Edit</button>

                                </form> -->


                                <form action="/category/{{$item->id}}" style="display : inline;" method="POST" id="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" data-id="{{$item->id}}"
                                        onclick="confirmDelete(this)"><i class="fa fa-trash"></i>hapus</button>
                                        <a class="btn btn-sm btn-warning" href="/category/{{$item->id}}/edit">Edit</a>
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
@include('category.form')
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

 
    var data_category = $(this).attr('data-id')
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
              form.action = '/kategori/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
    
    $(document).ready( function () {
    $('#table-category').DataTable()
    });
</script>

@endpush 