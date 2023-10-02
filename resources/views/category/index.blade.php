@extends('layout.app')
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
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
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

                                <form action="/kategori/{{$item->id}}/edit" style="display : inline;">
                                    <button type="submit" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i>Edit</button>

                                </form>


                                <form action="/kategori/{{$item->id}}/delete" style="display : inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
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
@endsection
@include('category.form')

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
