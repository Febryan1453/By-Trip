<div class="modal fade" id="deleteKategori{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Konfirmasi</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('landing.delete.kategori',$row->id)}}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="mb-3">
                        <p>Data <strong style="color: red;">{{$row->nama_kategori}}</strong> akan di hapus ?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>