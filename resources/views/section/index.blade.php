@extends('template')

@section('content')


<div class="d-flex justify-content-center align-items-center" style="padding-bottom: 100px;">
    <div class="row text-center">

        <div class="col d-flex justify-content-center">
            <a class="ancor" href="{{route('landing.list.kategori')}}">
                <div class="card latar" style="width: 18rem;">
                    <img src="https://images.unsplash.com/photo-1595319100920-5da5c235107a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=868&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">Data Kategori</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col jarak d-flex justify-content-center">
            <a class="ancor" href="{{route('landing.list.wisata')}}">
                <div class="card latar" style="width: 18rem;">
                    <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=871&q=80" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">Data Wisata</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

@endsection