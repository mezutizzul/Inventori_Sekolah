  <div class="modal fade" id="mdl-kembali">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title title-kembali">Kembali : <i class="fa fa-refresh fa-spin" style="color: black"> </i></h4>
            </div>
            <form action="" class="form-edit " method="POST" role="form" id="FormPengembalian">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden">
                            <div class="input-group no-border form-group bmd-form-group" style="padding-bottom: 0px">
                                <label for="jml" class="bmd-label-floating">Jumlah</label>
                                <input required readonly type="text" class="form-control no" id="jml" name="jml">
                                <a class=" satuan-option" style="font-size: 12px ; width: auto ; box-shadow: none ; padding-top: 15px">
                                </a>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 10px">
                            <div class="form-group is-filled">
                                <label for="tgl" class="">Tanggal Pengembalian</label>
                                <input  required name="tgl_pengembalian"  type="text" id="tgl" class="form-control datetimepicker tgl_pengembalian" value="<?= date("d M Y") ?>">
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kode_peminjaman" class="kode">
                    <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
\