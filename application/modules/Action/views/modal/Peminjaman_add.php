<div class="modal fade" id="mdl-pinjam">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title title-pinjam">Pinjam : <i class="fa fa-refresh fa-spin"> </i></h4>
            </div>
            <form action="" class="form-edit " method="POST" role="form" id="FormPeminjaman">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group" style="width: 90% ; margin-top: 0px">
                                <div class="col-xs-9">
                                    <label for="id_pelanggan" class="control-label">Pelanggan</label><br>
                                    <a style="float: right;" class="btn btn-primary btn-sm btn-fab btn-icons" data-toggle="modal" href='#pelanggan_add'>
                                        <i class="fa fa-plus "></i>
                                    </a>
                                    <select name="id_pelanggan" id="id_pelanggan"  style="width: 90%" class="form-control select2 dropdown-pelanggan" required>
                                        <option value="">Pilih Pelanggan</option>
                                    </select>
                                </div> 
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
                                <label for="tgl" class="">Tanggal Peminjaman</label>
                                <input  required name="tgl_peminjaman"  type="text" id="tgl" class="form-control datetimepicker tgl_peminjaman" value="<?= date("d M Y") ?>">
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_barang" class="id_barang">
                    <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
                <!-- <div class="row loading-data" style="padding-bottom: 20px">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <center>
                            <img class="loading-gif-image">
                        </center>
                    </div>
                </div> -->
            </div>
        </div>
    </div>