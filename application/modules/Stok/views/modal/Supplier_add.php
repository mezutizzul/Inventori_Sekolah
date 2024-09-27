<div class="modal fade" id="supplier_add">
    <div class="modal-dialog" style="margin-top: 30px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Supplier</h4>
            </div>
            <form action="" method="POST" role="form" id="FormAddSupplier">                    
                <div class="modal-body">    
                    <div class="form-group bmd-form-group">
                        <label for="supplier" class="bmd-label-floating">Nama Supplier</label>
                        <input type="text" class="form-control" required id="supplier" name="supplier">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="alamat" class="bmd-label-floating">Alamat</label>
                        <input type="text" class="form-control" required id="alamat" name="alamat">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="telp" class="bmd-label-floating">Telp</label>
                        <input type="telp" class="form-control no" required id="telp" name="telp">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="email" class="bmd-label-floating">Email</label>
                        <input type="email" class="form-control" required id="email" name="email">
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