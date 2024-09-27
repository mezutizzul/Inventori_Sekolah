<div class="modal fade" id="jenis_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Jenis Barang</h4>
            </div>
            <form action="" method="POST" role="form" id="FormAddJenis">                    
                <div class="modal-body">    
                    <div class="form-group bmd-form-group">
                        <label for="jenis" class="bmd-label-floating">Jenis Barang</label>
                        <input type="text" class="form-control" required id="jenis" name="jenis_barang">
                    </div>   
                    <div class="form-group bmd-form-group">
                        <label for="jenis" class="bmd-label-floating">Kode Barang</label>
                        <input maxlength="3" type="text" class="form-control" required id="jenis" name="kode_barang">
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