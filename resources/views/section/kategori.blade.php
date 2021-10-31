@extends('template')

@section('content')

<div class="text-center" style="padding: 0 0 100px 0;">
    <h2>List kategori wisata</h2>
    <p style="font-size: medium;">Jumlah kategori saat ini adalah : {{$jumlahKategori}} </p>
    <div class="card mt-4 py-4 px-5">
        <p style="text-align: right;"><a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-warning" href="#">+ Kategori</a></p>

        <div class="scroll">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 90px;">#</th>
                        <th scope="col" style="width: 190px;">Icon</th>
                        <th scope="col" style="width: 290px;">Nama kategori</th>
                        <th scope="col" style="width: 290px;">Slug</th>
                        <th scope="col">Action</th>
                    </tr>

                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @forelse($kategori as $row)
                    <tr style="vertical-align: 10px;">
                        <th>{{$i++}}</th>
                        <td><img src="{{url('asset/ict.png')}}" width="50px" alt="Icon Wisata"></td>
                        <td>{{$row->nama_kategori}}</td>
                        <td>{{$row->slug}}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editKategori{{$row->id}}"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteKategori{{$row->id}}"><i style="color: red;" class="fas fa-trash-alt"></i></a>
                            @include('modal.edit-kategori')
                            @include('modal.delete-kategori')
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Data belum ada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modal.create-kategori')

@endsection