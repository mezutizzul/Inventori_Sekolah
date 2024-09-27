<div class="modal fade" id="pelanggan_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Pelanggan</h4>
            </div>
            <form action="" method="POST" role="form" id="FormAddPelanggan">                    
                <div class="modal-body">    
                    <div class="form-group bmd-form-group">
                        <label for="nama" class="bmd-label-floating">Nama</label>
                        <input type="text" class="form-control" required id="nama" name="nama">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="id_kategori" class="control-label">Katogori Pelanggan</label><br>
                        <select name="kategori" id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-kategori" required>
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
            </form>
        </div>
    </div>
</div>