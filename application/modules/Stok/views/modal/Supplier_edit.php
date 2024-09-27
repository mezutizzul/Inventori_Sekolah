<div class="modal fade edit" id="supplier_edit">
    <div class="modal-dialog" style="margin-top: 30px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Barang</h4>
            </div>
            <form action="" class="form-edit hidden" method="POST" role="form" id="FormEditSupplier">
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="supplier" class=" ">Nama Supplier</label>
                        <input type="text" class="form-control" required id="supplier" name="supplier">
                    </div>
                    <div class="form-group ">
                        <label for="alamat" class=" ">Alamat</label>
                        <input type="text" class="form-control" required id="alamat" name="alamat">
                    </div>
                    <div class="form-group ">
                        <label for="telp" class=" ">Telp</label>
                        <input type="telp" class="form-control no" required id="telp" name="telp">
                    </div>
                    <div class="form-group ">
                        <label for="email" class=" ">Email</label>
                        <input type="email" class="form-control" required id="email" name="email">
                    </div>

                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <input type="hidden" name="id" class="id_supplier">
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