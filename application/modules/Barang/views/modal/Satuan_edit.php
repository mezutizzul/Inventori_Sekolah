<div class="modal fade edit" id="satuan_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Satuan Barang</h4>
            </div>
            <form action="" class="form-edit hidden" method="POST" role="form" id="FormEditSatuan">
                <div class="modal-body">
                    <div class="form-group bmd-form-group">
                        <label for="satuan_barang" class="label">Satuan Barang</label>
                        <input type="text" class="form-control" id="satuan_barang" name="satuan_barang">
                    </div>   
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <input type="hidden" name="id" class="id_satuan">
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