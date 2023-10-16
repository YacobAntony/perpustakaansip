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
                <table class="table table-hover">
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

                                <form action="/penerbit/{{$item->id}}/delete" style="display : inline;" >

                                    <a href="/penerbit/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i>Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick ="confirmDelete()" ><i
                                            class="fa fa-trash" ></i>hapus</button>


                                </form>


                                <form action="/penerbit/{{$item->id}}/delete" style="display : inline;"  id="delete-form" >
                                    
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
@endsection
@include('penerbit.form')

@section('script')
<script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>

@include('category.form')

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
