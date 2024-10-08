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
                            <form id="FormSearch1" page="/User/Ajax_user/userjurusan_" class="form-inline pull-right" table="userjurusan" role="form">
                                <div class="form-group ">
                                    <label for="jenis" class="bmd-label-floating">Cari userjurusan</label>
                                    <input type="text" class="form-control" id="jenis" name="form[search]">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm btn-fab btn-icons"><i class="fa fa-search"></i></button>
                                <div class="form-group  pull-right">
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons refresh" href="" >
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons" data-toggle="modal" href='#userjurusan_add'>
                                        <i class="fa fa-plus "></i>
                                    </a>
                                </div>
                            </form>
                            <div class="card">
                                <div class="card-body">
                                    <form class="row" id=filter>
                                        <div class="form-group col-md-4" style="width: 100% ; margin-top: 0px">
                                            <label for="id_kategori" class="control-label">Jabatan</label><br>
                                            <select name="kategori" id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-jabatan" required>
                                                <option value="">Pilih Jabatan</option>
                                                <option value="kaprokal"> Kaprokal </option>
                                                <option value="kabeng"> Kabeng </option>
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
                                    <table class="table table-striped datatable-userjurusan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jurusan/Bidang Keahlian</th>
                                                <th>NIP</th>
                                                <th>Jabatan</th>
                                                <th>No Telp</th>
                                                <th>Email</th>
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
                                    <div class="pagination-setting-userjurusan hidden" page="/User/Ajax_user/userjurusan_">
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
    <!-- modal  -->

    <div class="modal fade model-barang-add" id="userjurusan_add">
        <div class="modal-dialog" style="margin-top: 30px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Tambah User Jurusan</h4>
                </div>
                <form action="" method="POST" role="form" id="FormAdduserjurusan">                    
                    <div class="modal-body">    
                        <input type="hidden" class="form-control" required id="addnama" name="id">
                        <div class="form-group bmd-form-group">
                            <label for="addnama" class="bmd-label-floating">Nama</label>
                            <input type="text" class="form-control" required id="addnama" name="nama">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="addnip" class="bmd-label-floating">NIP</label>
                            <input type="text" class="form-control" required id="addnip" name="nip">
                        </div>
                        <div class="form-group" style="width: 100% ; margin-top: 0px">
                            <label for="id_kategori" class="control-label">Jabatan</label><br>
                            <select name="jabatan" id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-jabatan" required>
                                <option value="">Pilih Jabatan</option>
                                <option value="kaprokal">Kaprokal</option>
                                <option value="kabeng">Kabeng</option>
                            </select>
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="addu" class="bmd-label-floating">Username</label>
                            <input type="text" class="form-control" required id="addu" name="username">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="eml" class="bmd-label-floating">Email</label>
                            <input type="email" class="form-control" id="eml" name="email">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="tl" class="bmd-label-floating">Telp</label>
                            <input type="text" class="form-control" required id="tl" name="telp">
                        </div>
                       <div class="form-group collapse bidang" style="width: 100% ; margin-top: 0px">
                            <label for="bidang" class="control-label">Bidang Keahlian</label><br>
                            <select   id="bidang"  style="width: 100%" class="form-control select2 dropdown-bidang" required>
                                <option value="">Pilih Bidang</option>
                            </select>
                        </div>
                        <div class="form-group collapse jurusan" style="width: 100% ; margin-top: 0px">
                            <label for="bidang" class="control-label">Jurusan</label><br>
                            <select   id="bidang"  style="width: 100%" class="form-control select2 dropdown-jurusan" required>
                                <option value="">Pilih Jurusan</option>
                            </select>
                        </div> 
                        <div class="form-group bmd-form-group">
                            <label for="pw" class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control" required id="pw" name="password">
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
    <div class="modal fade model-barang-add" id="userjurusan_edit">
        <div class="modal-dialog" style="margin-top: 30px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit User Jurusan</h4>
                </div>
                <form action="" method="POST" role="form" id="FormEdituserjurusan">                    
                    <input type="hidden" name="id">
                    <div class="modal-body">    
                        <input type="hidden" class="form-control" required id="addnama" name="id">
                        <div class="form-group bmd-form-group">
                            <label for="en" class="">Nama</label>
                            <input type="text" class="form-control" required id="en" name="nama">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="en" class="">NIP</label>
                            <input type="text" class="form-control" required id="en" name="nip">
                        </div>
                        <div class="form-group" style="width: 100% ; margin-top: 0px">
                            <label for="d" class="control-label">Jabatan</label><br>
                            <select name="jabatan" id="d"  style="width: 100%" class="form-control select2 dropdown-jabatan" required>
                                <option value="">Pilih Jabatan</option>
                                <option value="kaprokal">Kaprokal</option>
                                <option value="kabeng">Kabeng</option>
                            </select>
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="v" class="">Username</label>
                            <input type="text" class="form-control" required id="v" name="username">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="g" class="">Email</label>
                            <input type="email" class="form-control" id="g" name="email">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="y" class="">Telp</label>
                            <input type="text" class="form-control" required id="y" name="telp">
                        </div>
                        <div class="form-group collapse bidang" style="width: 100% ; margin-top: 0px">
                            <label for="bidang" class="control-label">Bidang Keahlian</label><br>
                            <select  id="bidang"  style="width: 100%" class="form-control select2 dropdown-bidang" required>
                                <option value="">Pilih Bidang</option>
                            </select>
                        </div>
                        <div class="form-group collapse jurusan" style="width: 100% ; margin-top: 0px">
                            <label for="bidang" class="control-label">Jurusan</label><br>
                            <select   id="bidang"  style="width: 100%" class="form-control select2 dropdown-jurusan" required>
                                <option value="">Pilih Jurusan</option>
                            </select>
                        </div> 
                        <div class="form-group bmd-form-group">
                            <label for="dwa" class="">Password</label>
                            <input type="password" class="form-control" required id="dwa" name="password">
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

    <div class="modal fade" id="userjurusan_delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Hapus Sumber Barang</h4>
                </div>
                <form action="" method="POST" role="form" id="FormDeleteuserjurusan">                    
                    <div class="modal-body">
                        <p>Anda Yakin Akan Menghapus Data ini .?</p>
                    </div>
                    <div class="modal-footer">
                        <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <input type="hidden" name="id" class="id">
                </form>
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
        var page = "/User/Ajax_user/userjurusan_";
        $(document).ready(function() {
            $(" .select2.dropdown-kategori,.select2.dropdown-jabatan").select2({
            });

            $("#filter .dropdown-jabatan").change(function() {
                $('#FormSearch1').submit();
            });

            $("#FormSearch1").submit(function() {
                var table = $(this).attr("table");
                request["jabatan"]= $("#filter .dropdown-jabatan").val();
                request["Page"] = 1;
                request["search"] =  $(this).find("input[type='text']").val() ;
                page = $(this).attr("page");
                GetData(request, table, getfunc);
                return false;
            });

            page = "/User/Ajax_user/userjurusan_";
            GetData(request, "userjurusan",function(){
                 GetDropdownBidang("","",function(resp){
                     GetDropdownJurusan("","","") ;
                 })
            });

        });

        var FrmTambahKategori = $("#FormAdduserjurusan").validate({
            submitHandler: function(form) {
                InsertData(form, function(resp) {
                    page = "/User/Ajax_user/userjurusan_";
                    GetData(request, "userjurusan");
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

        var FrmDeleteKategori = $("#FormDeleteuserjurusan").validate({
            submitHandler: function(form) {
                DeleteData(form, function(resp) {
                    page = "/User/Ajax_user/userjurusan_";
                    GetData(request, "userjurusan");
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

        var FrmEditKategori = $("#FormEdituserjurusan").validate({
            submitHandler: function(form) {
                UpdateData(form, function(resp) {
                    request['id']='';
                    page = "/User/Ajax_user/userjurusan_";
                    GetData(request, "userjurusan");
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

        $(".dropdown-jabatan").change(function(event) {
            if($(this).val()=="kaprokal"){
                $(this).parent().parent().find('.dropdown-jurusan').removeAttr('name');
                $(this).parent().parent().find('.jurusan').collapse("hide") ;
                $(this).parent().parent().find('.dropdown-bidang').attr('name', 'jurusan');
                $(this).parent().parent().find('.bidang').collapse("show") ;
            }else if($(this).val()=="kabeng"){
                $(this).parent().parent().find('.jurusan').collapse("show");
                $(this).parent().parent().find('.dropdown-jurusan').attr('name', 'jurusan');
                $(this).parent().parent().find('.bidang').collapse("hide");
                $(this).parent().parent().find('.dropdown-bidang').removeAttr('name');
            }else{
                $(this).parent().parent().find('.jurusan').collapse("hide");
                $(this).parent().parent().find('.dropdown-jurusan').removeAttr('name');
                $(this).parent().parent().find('.dropdown-bidang').removeAttr('name');
                $(this).parent().parent().find('.bidang').collapse("hide");
            }
            $(this).parent().parent().find('#bidang-error').remove();
        });
        


    </script>
</body>


</html>