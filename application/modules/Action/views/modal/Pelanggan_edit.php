<div class="modal fade edit" id="pelanggan_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Pelanggan</h4>
            </div>
            <form action="" class="form-edit hidden" method="POST" role="form" id="FormEditPelanggan">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="">Nama</label>
                        <input type="text" class="form-control" required id="nama" name="nama">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="id_kategori" class="control-label">Katogori Pelanggan</label><br>
                        <select name="kategori" id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-kategoribarang" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Guru"> Guru </option>
                            <option value="Karyawan"> Karyawan </option>
                        </select>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="tgl" class="">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                    </div>      
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <input type="hidden" name="id" class="id_pelanggan">
            </form>
            <div class="row loading-data" style="padding-bottom: 20px">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <img class="loading-gif-image">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>