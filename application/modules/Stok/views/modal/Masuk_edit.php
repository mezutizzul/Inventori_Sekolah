<div class="modal fade edit" id="supplier_edit">
    <div class="modal-dialog" style="margin-top: 30px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Barang</h4>
            </div>
            <form action="" class="form-edit hidden" method="POST" role="form" id="FormEditSupplier">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group" style="width: 90% ; margin-top: 0px">
                                <div class="col-xs-9">
                                    <label for="id_barang" class="control-label">Barang</label><br>
                                    <a style="float: right;" class="btn btn-primary btn-sm btn-fab btn-icons" data-toggle="modal" href='#barang_add'>
                                        <i class="fa fa-plus "></i>
                                    </a>
                                    <select name="id_barang" id="id_barang"  style="width: 90%" class="form-control select2 dropdown-barang" required>
                                        <option value="">Pilih Barang</option>
                                    </select>
                                </div> 
                            </div> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group" style="width: 100% ; margin-top: 0px">
                                <label for="id_supplier" class="control-label">Sumber Barang</label><br>
                                <select name="id_supplier" id="id_supplier"  style="width: 100%" class="form-control select2 dropdown-supplier" required>
                                    <option value="">Pilih Supplier</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group no-border form-group bmd-form-group" style="padding-bottom: 0px">
                                <label for="jml" class="bmd-label-floating">Jumlah</label>
                                <input required type="text" class="form-control no" id="jml" name="jml">
                                <a class=" satuan-option" style="font-size: 12px ; width: auto ; box-shadow: none ; padding-top: 15px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 10px">
                            <div class="form-group is-filled">
                                <label for="tgl" class="">Tanggal Masuk</label>
                                <input  required name="tgl_masuk"  type="text" id="tgl" class="form-control datetimepicker tgl_masuk">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 10px">
                            <div class="form-group is-filled">
                                <label for="tgl" class="">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
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