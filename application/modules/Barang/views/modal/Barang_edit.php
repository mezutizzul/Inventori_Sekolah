<div class="modal fade edit" id="barang_edit">
    <div class="modal-dialog" style="margin-top: 30px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Barang</h4>
            </div>
            <form action="" class="form-edit hidden" method="POST" role="form" id="FormEditBarang">
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="dnama" class=" ">Nama Barang</label>
                        <input type="text" class="form-control" required id="dnama" name="nama">
                    </div>
                    <div class="form-group" style="width: 100% ; margin-top: 0px">
                        <label for="id_kategori" class="control-label">Katogori Barang</label><br>
                        <select  id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-kategoribarang" required>
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
                        <label for="kode" class="">Kode Barang</label>
                        <input type="text" readonly class="form-control" required id="kode_barang">
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
                <input type="hidden" name="id" class="id_barang">
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