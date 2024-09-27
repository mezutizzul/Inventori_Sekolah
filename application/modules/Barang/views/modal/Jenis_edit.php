<div class="modal fade edit" id="jenis_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Jenis Barang</h4>
            </div>
            <form action="" class="form-edit hidden" method="POST" role="form" id="FormEditJenis">
                <div class="modal-body">
                    <div class="form-group bmd-form-group">
                        <label for="jenis_barang" class="label">Jenis Barang</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang">
                    </div>   
                    <div class="form-group bmd-form-group">
                        <label for="jenis" class="bmd-label-floating">Kode Barang</label>
                        <input readonly type="text" class="form-control" id="kode_barang" value="12">
                    </div>
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <input type="hidden" name="id" class="id_jenis">
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