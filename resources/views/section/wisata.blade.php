@extends('template')

@section('content')

<div class="text-center" style="padding: 0 0 100px 0;">
    <h2>List data wisata</h2>
    <p style="font-size: medium;">Jumlah wisata saat ini adalah : {{$jumlahWisata}} </p>
    <div class="card mt-4 py-4 px-5">
        <p style="text-align: right;"><a data-bs-toggle="modal" data-bs-target="#addWisata" class="btn btn-warning" href="#">+ Wisata</a></p>

        <div class="scroll">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama wisata</th>
                        <th scope="col">Buka</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse($wisata as $row)
                    <tr style="vertical-align: 10px;">
                        <td><img src="{{$row->image}}" width="100px" alt="Icon Wisata"></td>
                        <td>{{$row->kategori->nama_kategori}}</td>
                        <td>{{$row->nama_wisata}}</td>
                        <td>{{$row->waktu_buka}}</td>
                        <td>{{$row->kota}}</td>
                        <td>{{$row->provinsi}}</td>
                        <td>{{$row->latitude}}</td>
                        <td>{{$row->longitude}}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editWisata{{$row->id}}"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWisata{{$row->id}}"><i style="color: red;" class="fas fa-trash-alt"></i></a>
                            @include('modal.edit-wisata')
                            @include('modal.delete-wisata')
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

@include('modal.create-wisata')

@endsection