<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url("/") ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url("/") ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Inventori || <?= $page ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="<?= base_url("/") ?>assets/font-awesome/latest/css/font-awesome.min.css">
    <link href="<?= base_url("/") ?>assets/css/material-dashboard.minf066.css?v=2.1.0" rel="stylesheet" />
    <link href="<?= base_url("/") ?>assets/demo/demo.css" rel="stylesheet" />
    <link href="<?= base_url("/") ?>assets/app/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?= base_url("/") ?>assets/js/plugins/select2/select2.min.css" rel="stylesheet" />
    <link href="<?= base_url("/") ?>assets/app/app.css?<?= date("Y-m-d h:i:s") ?>" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <?php $this->load->view('Sidebar');  ?>
        <div class="main-panel">
            <?php $this->load->view('Header');  ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="FormSearch1" page="/Jurusan/Ajax_jurusan/jurusan_" class="form-inline pull-right" table="jurusan" role="form">
                                <div class="form-group ">
                                    <label for="jenis" class="bmd-label-floating">Cari Keahlian</label>
                                    <input type="text" class="form-control" id="jenis" name="form[search]">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm btn-fab btn-icons"><i class="fa fa-search"></i></button>
                                <div class="form-group  pull-right">
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons refresh" href="" >
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons" data-toggle="modal" href='#jurusan_add'>
                                        <i class="fa fa-plus "></i>
                                    </a>
                                </div>
                            </form>
                            <div class="card hidden">
                                <div class="card-body">
                                    <form class="row" id=filter> 
                                        <div class="form-group col-md-4" style="width: 100% ; margin-top: 0px">
                                            <label for="id_kategori" class="control-label">Bidang Keahlian</label><br>
                                            <select name="id_kategori" id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-bidangkeahlian" required>
                                                <option value="">Pilih Bidang Keahlian</option>
                                            </select>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-body table-responsive">
                                    <div class="row">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                    <table class="table table-striped datatable-jurusan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jurusan</th>
                                                <th>Bidang Keahlian</th>
                                                <th  style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="10">
                                                    <center>
                                                        <img class="loading-gif-image">
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="hidden">
                                            <tr>
                                                <td>loding</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer pull-right">
                                    <div class="pagination-setting-jurusan hidden" page="/Jurusan/Ajax_jurusan/jurusan_">
                                        <p class="pagination-info ">dari ke </p>
                                        <nav aria-label="Page navigation ">
                                            <ul class="pagination" >
                                                <li class="page-item">
                                                    <a class="page-link btn btn-success btn-page btn-first" style="border-radius: 4px !important" title="First" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                                                    </a>
                                                </li>
                                                <li class="page-item" style="margin-right: 5px">
                                                    <a class="page-link btn btn-success btn-page btn-prev" style="border-radius: 4px !important" title="Previous">
                                                        <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <form id="Goto" class="navbar-form pull-right">
                                                        <input type="text" class="form-control no">
                                                    </form>
                                                </li>
                                                <li class="page-item" style="margin-left: 5px">
                                                    <a class="page-link btn btn-success btn-page btn-next" style="border-radius: 4px !important"  title="Next">
                                                        <span aria-hidden="true">
                                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link btn btn-success btn-page btn-last" style="border-radius: 4px !important"  title="Last">
                                                        <span aria-hidden="true">
                                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add -->

    <div class="modal fade" id="jurusan_add">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Jurusan</h4>
            </div>
            <form action="" method="POST" role="form" id="FormAddJurusan">                    
                <div class="modal-body">    
                    <div class="form-group" style="width: 100% ; margin-top: 0px">
                        <label for="bidang" class="control-label">Bidang Keahlian</label><br>
                        <select name="j_id" id="bidang"  style="width: 100%" class="form-control select2 dropdown-bidang" required>
                            <option value="">Pilih Bidang</option>
                        </select>
                    </div> 
                    <div class="form-group bmd-form-group">
                        <label for="addnama" class="bmd-label-floating">Jurusan</label>
                        <input type="text" class="form-control" required id="addnama" name="jurusan">
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

    <!-- Modal delete -->

    <div class="modal fade" id="jurusan_delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Hapus Jurusan</h4>
                </div>
                <form action="" method="POST" role="form" id="FormDeleteJurusan">                    
                    <div class="modal-body">
                        <p>Anda Yakin Akan Menghapus Data ini .?</p>
                    </div>
                    <div class="modal-footer">
                        <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <input type="hidden" name="id" class="id_jurusan">
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit -->

    <div class="modal fade edit" id="jurusan_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Jurusan</h4>
                </div>
                <form action="" class="form-edit hidden" method="POST" role="form" id="FormEditJurusan">
                    <div class="modal-body">
                        <div class="form-group" style="width: 100% ; margin-top: 0px">
                            <label for="bidang" class="control-label">Bidang Keahlian</label><br>
                            <select name="j_id" id="bidang"  style="width: 100%" class="form-control select2 dropdown-bidang" required>
                                <option value="">Pilih Bidang</option>
                            </select>
                        </div> 
                        <div class="form-group bmd-form-group">
                            <label for="jenis_barang" class="label">Jurusan</label>
                            <input type="text" class="form-control jurusan_nama" name="jurusan">
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <input type="hidden" name="id" class="id_jurusan">
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


    <!--   Core JS Files   -->
    <script src="<?= base_url("/") ?>assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/moment.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/nouislider.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/jquery.validate.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/material-dashboard.minf066.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/bawaan.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/app.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script type="text/javascript">
        var page = "/Jurusan/Ajax_jurusan/jurusan_";
        $(document).ready(function() {

            $("#FormSearch1").submit(function() {
                var table = $(this).attr("table");
                request["Page"] = 1;
                request["search"] =  $(this).find("input[type='text']").val() ;
                page = $(this).attr("page");
                GetData(request, table, getfunc);
                return false;
            });
            GetDropdownBidang("","",function(resp){
                GetData(request, "jurusan");   
            })
        }) ;        

        var FrmTambahKategori = $("#FormAddJurusan").validate({
            submitHandler: function(form) {
                InsertData(form, function(resp) {
                    page = "/Jurusan/Ajax_jurusan/jurusan_";
                    GetData(request, "jurusan");
                });
            },
            errorPlacement: function (error, element) {
                if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2") || element.hasClass("select")) {
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });

        var FrmDeleteKategori = $("#FormDeleteJurusan").validate({
            submitHandler: function(form) {
                DeleteData(form, function(resp) {
                    page = "/Jurusan/Ajax_jurusan/jurusan_";
                    GetData(request, "jurusan");
                });
            },
            errorPlacement: function (error, element) {
                if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2") || element.hasClass("select")) {
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });

        var FrmEditKategori = $("#FormEditJurusan").validate({
            submitHandler: function(form) {
                UpdateData(form, function(resp) {
                    request['id']='';
                    page = "/Jurusan/Ajax_jurusan/jurusan_";
                    GetData(request, "jurusan");
                });
            },
            errorPlacement: function (error, element) {
                if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2") || element.hasClass("select")) {
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });

        var modal_edit = $("#jurusan_edit");
        var modal_delete = $("#jurusan_delete");

        $(".datatable-jurusan tbody").on("click", ".delete-data", function() {
            id = $(this).attr('data-id');
            name = $(this).attr('data-name');
            modal_delete.find('.id_jurusan').val(id);
            modal_delete.find('p').html("Anda Yakin menghapus '"+name+"' ?");
        });

        $(".datatable-jurusan tbody").on("click", ".edit-data", function() {
            reqs['id'] = $(this).attr('data-id');
            modal_edit.find('.loading-data').removeClass('hidden');
            modal_edit.find('.form-edit').addClass('hidden');
            GetDataById(reqs,function(resp){
                var modal_edit = $("#jurusan_edit");
                modal_edit.find('.id_jurusan').val(reqs['id']);
                modal_edit.find('.jurusan_nama').val(resp['Data'][0]['jurusan']);
                modal_edit.find('.dropdown-bidang').val(resp['Data'][0]['j_id']).trigger('change');
                modal_edit.find('.loading-data').addClass('hidden');
                modal_edit.find('.form-edit').removeClass('hidden');
            })
        });

    </script>
</body>


</html>