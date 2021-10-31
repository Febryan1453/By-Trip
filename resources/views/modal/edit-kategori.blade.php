<div class="modal fade" id="editKategori{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Edit Kategori</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('landing.edit.kategori')}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body" style="text-align: left;">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="hidden" name="id" value="{{$row->id}}" class="form-control" id="nama_kategori" aria-describedby="emailHelp">
                        <input type="text" name="nama_kategori" value="{{$row->nama_kategori}}" class="form-control" id="nama_kategori" aria-describedby="emailHelp">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>