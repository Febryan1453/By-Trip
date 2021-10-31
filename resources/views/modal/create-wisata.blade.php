<div class="modal fade" id="addWisata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Destinasi Wisata</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('landing.add.wisata')}}" method="post">
                @csrf
                <div class="scroll-modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama_wisata" class="form-label">Nama wisata</label>
                                    <input required type="text" name="nama_wisata" class="form-control" id="nama_wisata" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kategori_id" class="form-label">Kategori wisata</label>
                                    <?php $kategori = App\Models\Kategori::all(); ?>
                                    <select required class="form-select" name="kategori_id">
                                        <option value="">-- Pilih --</option>
                                        @foreach($kategori as $kat)
                                        <option value="{{$kat->id}}">{{$kat->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="waktu_buka" class="form-label">Waktu buka</label>
                                    <input required type="text" placeholder="Contoh : 08.30" name="waktu_buka" class="form-control" id="waktu_buka" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input required type="text" name="harga" class="form-control" id="harga" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input required type="text" name="kota" class="form-control" id="kota" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <input required type="text" name="provinsi" class="form-control" id="provinsi" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea required name="alamat" id="alamat" class="form-control" cols="30" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input required type="text" name="latitude" class="form-control" id="latitude" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input required type="text" name="longitude" class="form-control" id="longitude" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea required name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input required placeholder="Masukkan URL gambar" type="text" name="image" class="form-control" id="image" aria-describedby="emailHelp">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>