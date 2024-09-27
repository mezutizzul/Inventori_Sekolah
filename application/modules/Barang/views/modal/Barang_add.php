<div class="modal fade model-barang-add" id="barang_add">
    <div class="modal-dialog" style="margin-top: 30px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Barang</h4>
            </div>
            <form action="" method="POST" role="form" id="FormAddBarang">                    
                <div class="modal-body">    
                    <div class="form-group bmd-form-group">
                        <label for="addnama" class="bmd-label-floating">Nama Barang</label>
                        <input type="text" class="form-control" required id="addnama" name="nama">
                    </div>
                    <div class="form-group" style="width: 100% ; margin-top: 0px">
                        <label for="id_kategori" class="control-label">Katogori Barang</label><br>
                        <select name="id_kategori" id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-kategoribarang" required>
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div> 
                    <div class="form-group" style="width: 100% ; margin-top: 0px">
                        <label for="id_satuan" class="control-label">Satuan Barang</label><br>
                        <select name="id_satuan" id="id_satuan"  style="width: 100%" class="form-control select2 dropdown-satuanbarang" required>
                            <option value="">Pilih Satuan</option>
                        </select>
                    </div> 
                    <div class="form-group" style="width: 100% ; margin-top: 0px">
                        <label for="id_sumber" class="control-label">Sumber Barang</label><br>
                        <select name="id_sumber" id="id_sumber"  style="width: 100%" class="form-control select2 dropdown-sumberbarang" required>
                            <option value="">Pilih Sumber Barang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_barangX" class="">Kode Barang</label>
                        <input type="text" class="form-control" required id="kode_barangX" name="kode_barang">
                    </div> 
                    <div class="form-group">
                        <label for="stok_awal" class="">Stok Awal</label>
                        <input type="text" class="form-control no" required id="stok_awal" name="stok_awal">
                    </div>  
                    <div class="form-group">
                        <label for="Spesifikasi" class="">Spesifikasi</label>
                        <input type="text" class="form-control" id="Spesifikasi" name="spesifikasi">
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