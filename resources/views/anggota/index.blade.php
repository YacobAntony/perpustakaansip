@extends('layout.app')
@section('title', 'anggota')
@section('content')
  <section class="section">
          <div class="section-header">
            <h1>Anggota</h1>
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
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">kode</th>
                          <th scope="col">nama</th>
                          <th scope="col">kelamin</th>
                          <!-- <th scope="col">tempat lahir</th>
                          <th scope="col">tanggal lahir</th> -->
                          <th scope="col">telepon</th>
                          <th scope="col">alamat</th>
                          <th scope="col">gambar</th>
                          <th scope="col">aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($anggota as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jenis_kelamin}}</td>
                            <!-- <td>{{$item->tempat_lahir}}</td>
                            <td>{{$item->tanggal_lahir}}</td> -->
                            <td>{{$item->telepon}}</td>
                            <td>{{$item->alamat}}</td>
                            <td><img src="{{asset('/storage/anggota/'.$item->foto)}}" alt="{{$item->foto}}" style="width: 150px"></td>
                            <td>|

                               

                                <form action="/anggota/{{$item->id}}/edit" style="display : inline;">
                                    <button type="submit" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i>Edit</button>

                                </form>


                                <form action="/anggota/{{$item->id}}/delete" style="display : inline;" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick ="confirmDelete()"><i
                                            class="fa fa-trash"></i>hapus</button> 

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
@include('anggota.form')
@endsection


@section('script')
<script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>



@if (session('sukses'))
<script>
    iziToast.success({
        title: '{{session('sukses')}}',
        position: 'topRight'
    })
</script>
@endif

@endsection
@push('script')
<script>
    function confirmDelete(){
        event.preventDefault()  
    swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal(
        document.getElementById('delete-form').submit()
      )
      }
    });
}

</script>
@endpush