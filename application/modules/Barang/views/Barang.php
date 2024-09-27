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
                            <form id="FormSearch1" page="/Barang/Ajax_barang/barang_" class="form-inline pull-right" table="barang" role="form">
                                <div class="form-group ">
                                    <label for="jenis" class="bmd-label-floating">Cari Barang</label>
                                    <input type="text" class="form-control" id="jenis" name="form[search]">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm btn-fab btn-icons"><i class="fa fa-search"></i></button>
                                <div class="form-group  pull-right">
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons refresh" href="" >
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons" data-toggle="modal" href='#import' >
                                        <i class="fa fa-file"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons" data-toggle="modal" href='#barang_add'>
                                        <i class="fa fa-plus "></i>
                                    </a>
                                </div>
                            </form>
                            <div class="card">
                                <div class="card-body">
                                    <form class="row" id=filter>
                                        <div class="form-group col-md-4" style="width: 100% ; margin-top: 0px">
                                            <label for="id_kategori" class="control-label">Katogori Barang</label><br>
                                            <select name="id_kategori" id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-kategoribarang" required>
                                                <option value="">Pilih Kategori</option>
                                            </select>
                                        </div> 
                                        <div class="form-group col-md-4" style="width: 100% ; margin-top: 0px">
                                            <label for="id_satuan" class="control-label">Satuan Barang</label><br>
                                            <select name="id_satuan" id="id_satuan"  style="width: 100%" class="form-control select2 dropdown-satuanbarang" required>
                                                <option value="">Pilih Satuan</option>
                                            </select>
                                        </div> 
                                        <div class="form-group col-md-4" style="width: 100% ; margin-top: 0px">
                                            <label for="id_sumber" class="control-label">Sumber Barang</label><br>
                                            <select name="id_sumber" id="id_sumber"  style="width: 100%" class="form-control select2 dropdown-sumberbarang" required>
                                                <option value="">Pilih Sumber Barang</option>
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
                                    <table class="table table-striped datatable-barang">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kode</th>
                                                <th>Stok Barang</th>
                                                <th>Sumber Barang</th>
                                                <th>Kategori</th>
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
                                    <div class="pagination-setting-barang hidden" page="/Barang/Ajax_barang/barang_">
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
    <div class="modal fade" id="import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Import Barang</h4>
                </div>
                <form id="upload_file">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Upload File </label>
                            <center>
                                <input style="z-index: 1 ;opacity: 1" type="file" class="form-control fileimportsiswa" required>
                                <input type="hidden" class="fileimportsiswa-hidden" name="FileBase64">
                                <input type="hidden" class="fileimportsiswaext-hidden" name="FileExtension">
                            </center>
                            <label class="text text-danger">*Pilih file dengan format xlsm/xlsx</label>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default btn-sm text-white" data-dismiss="modal">Close</a>
                        <a class="btn btn-danger btn-sm text-white" download href="<?= base_url("assets/template/Import_barang.xlsx") ?>">Download Template</a>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>
                </form>
                <form method="post" class="hidden" id="upload_act" action="<?= base_url("Barang/Import.html") ?>">
                    <input type="hidden" name="file" class="file_expost">
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view('modal/Barang_add'); ?>
    <?php $this->load->view('modal/Barang_edit'); ?>
    <?php $this->load->view('modal/Barang_delete'); ?>

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
        var page = "/Barang/Ajax_barang/barang_";
        $(document).ready(function() {
            $(".select2.dropdown-satuanbarang ,.select2.dropdown-kategoribarang ,.select2.dropdown-sumberbarang ").select2({
                disabled: true ,
                placeholder: "Loading",
            });

            $("#filter .dropdown-satuanbarang ,#filter .dropdown-kategoribarang ,#filter .dropdown-sumberbarang ").change(function() {
                $('#FormSearch1').submit();
            });

            $("#FormSearch1").submit(function() {
                var table = $(this).attr("table");
                request["id_kategori"]= $("#filter .dropdown-kategoribarang").val();
                request["id_satuan"]= $("#filter .dropdown-satuanbarang").val();
                request["id_sumber"]= $("#filter .dropdown-sumberbarang").val();
                request["Page"] = 1;
                request["search"] =  $(this).find("input[type='text']").val() ;
                page = $(this).attr("page");
                GetData(request, table, getfunc);
                return false;
            });


            GetDropdownKategori('','',function(resp){
                GetDropdownSatuan('','',function(resp){
                    GetDropdownSumber('','',function(resp){
                        page = "/Barang/Ajax_barang/barang_";
                        GetData(request, "barang",function(){
                            $("#FormEditBarang .dropdown-kategoribarang").select2({
                                disabled: true ,
                            });
                        });
                    });
                })
            });
        });

        var FrmTambahKategori = $("#FormAddBarang").validate({
            submitHandler: function(form) {
                InsertData(form, function(resp) {
                    page = "/Barang/Ajax_barang/barang_";
                    GetData(request, "barang");
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

        var FrmDeleteKategori = $("#FormDeleteBarang").validate({
            submitHandler: function(form) {
                DeleteData(form, function(resp) {
                    page = "/Barang/Ajax_barang/barang_";
                    GetData(request, "barang");
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

        var FrmEditKategori = $("#FormEditBarang").validate({
            submitHandler: function(form) {
                UpdateData(form, function(resp) {
                    request['id']='';
                    page = "/Barang/Ajax_barang/barang_";
                    GetData(request, "barang");
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

        $("#barang_add .dropdown-kategoribarang").on("select2:select",function(event) {
            var code = $(this).val();
            code = $('option:selected', this).attr('kode');
            $("#barang_add #kode_barang").val(code);
        });

        $(".fileimportsiswa").change(function() {
            var selector = $(this);
            if (this.files && this.files[0]) {
                var tipefile = this.files[0].type.toString();
                var filename = this.files[0].name.toString();
                var tipe = ['application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip', 'application/vnd.ms-excel.sheet.macroEnabled.12'];
                if(tipe.indexOf(tipefile) == -1) {
                    $(this).val("");
                    toastrshow("warning", "Format salah, pilih file dengan format xls/xlsm/xlsx", "Warning");
                    return;
                }

                if((this.files[0].size / 1024) < 2048){
                    var FR = new FileReader();
                    FR.addEventListener("load", function(e) {
                        var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                        var ext = filename.split(".").pop();
                        $(".fileimportsiswa-hidden").val(base64);
                        $(".fileimportsiswaext-hidden").val(ext);
                    }); 
                    FR.readAsDataURL(this.files[0]);
                } else {
                    $(this).val("");
                    toastrshow("warning", "Ukuran file maksimum adalah 2 MB", "Warning");
                }
            }
        });


        var Upload = $("#upload_file").validate({
            submitHandler: function(form) {
                $.ajax({
                    url: '<?= base_url("Tool/upload_file.html") ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: $(form).serialize(),
                    success:function(resp){
                        if(resp.IsError){
                            toastrshow("warning", resp.ErrMessage , "Warning");
                        }else{
                            $(".file_expost").val(resp.Output) ;
                            $("#upload_act").submit();
                        }
                    }
                })
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

    </script>
</body>


</html>