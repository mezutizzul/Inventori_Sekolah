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
                            <form id="FormSearch1" page="/Pengajuan/Ajax_pengajuan/pengajuan_" class="form-inline pull-right" table="pengajuan" role="form">
                                <div class="form-group ">
                                    <label for="jenis" class="bmd-label-floating">Cari Pengajuan</label>
                                    <input type="text" class="form-control" id="jenis" name="form[search]">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm btn-fab btn-icons"><i class="fa fa-search"></i></button>
                                <div class="form-group  pull-right">
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons refresh" href="" >
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons" href='<?= base_url("Pengajuan/add.html") ?>'>
                                        <i class="fa fa-plus "></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons hidden" data-toggle="modal" href='#pengajuan_print'>
                                        <i class="fa fa-file-pdf-o "></i>
                                    </a>
                                </div>
                            </form>
                            <div class="card hidden">
                                <div class="card-body">
                                    <form class="row" id=filter>
                                        <div class="form-group col-md-4" style="width: 100% ; margin-top: 0px">
                                            <label for="id_satuan" class="control-label">Satuan Barang</label><br>
                                            <select name="id_satuan" id="id_satuan"  style="width: 100%" class="form-control select2 dropdown-satuanbarang" required>
                                                <option value="">Pilih Satuan</option>
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
                                    <table class="table table-striped datatable-pengajuan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tgl Pengajuan</th>
                                                <th>Jurusan</th>
                                                <th>Kaprokal</th>
                                                <th>Sarpas</th>
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
                                    <div class="pagination-setting-pengajuan hidden" page="/Pengajuan/Ajax_pengajuan/pengajuan_">
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
    <div class="modal fade" id="pengajuan_print">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Print Pengajuan</h4>
                </div>
                <form action="" method="POST" role="form" id="FormPengajuanPrint">                    
                    <div class="modal-body">    
                        <div class="form-group" style="width: 100% ; margin-top: 0px">
                            <label for="id_satuan" class="control-label">Barang</label><br>
                            <select name="id_satuan" id="id_satuan"  style="width: 100%" class="form-control select2 dropdown-pengajuanbarang multiple" multiple required>
                                <option value="">Pilih Barang</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="id_hidden">
                        <a role="button" class="btn btn-danger text-white" data-dismiss="modal">Batal</a>
                        <button type="submit" class="btn btn-primary">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detail_kaprokal" width="">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">List Barang</h4>
                </div>
                <div class="modal-body" style="max-height:350px !important ; overflow-y: auto">
                    <table class="table table-hover  datatable-detail-kaprokal">
                        <thead>
                            <tr>
                                <th width="45%">Barang</th>
                                <th width="15%">Jml(Satuan)</th>
                                <th width="25%">Harga Satuan</th>
                                <th width="15%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <script src="<?= base_url("/") ?>assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/nouislider.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/jquery.validate.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/material-dashboard.minf066.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/bawaan.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/app.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script type="text/javascript">
        var page = "/Pengajuan/Ajax_pengajuan/pengajuan_";
        $(document).ready(function() {
            $(".select2.dropdown-satuanbarang ,.select2.dropdown-pelanggan ,.select2.dropdown-kategoribarang ,.select2.dropdown-kategori ").select2({
                // disabled: true ,
                // placeholder: "Loading",
            });

            $(".select2.dropdown-pengajuanbarang").select2({
                placeholder:"Pilih Barang",
            })

            $('.datetimepicker').datetimepicker({
                icons: {
                    time: "fa fa-clock-o black",
                    date: "fa fa-calendar black",
                    up: "fa fa-chevron-up black",
                    down: "fa fa-chevron-down black",
                    previous: 'fa fa-chevron-left  black',
                    next: 'fa fa-chevron-right black',
                    today: 'fa fa-screenshot black',
                    clear: 'fa fa-trash black',
                    close: 'fa fa-remove black'
                },
                format:"DD MMM YYYY" 
            });

            $("#filter .dropdown-satuanbarang ,#filter .dropdown-kategoribarang ,#filter .dropdown-sumberbarang ").change(function() {
                $('#FormSearch1').submit();
            });

            $("#FormSearch1").submit(function() {
                var table = $(this).attr("table");
                request["id_kategori"]= $("#filter .dropdown-kategoribarang").val();
                request["id_satuan"]= $("#filter .dropdown-satuanbarang").val();
                request["Page"] = 1;
                request["search"] =  $(this).find("input[type='text']").val() ;
                page = $(this).attr("page");
                GetData(request, table, getfunc);
                return false;
            });

            // GetDropdownPengajuan('','',function(resp){
            //     GetDropdownKategori('','',function(resp){
            //         GetDropdownSatuan('','',function(resp){
            //             GetDropdownPelanggan('','',function(resp){
                            page = "/Pengajuan/Ajax_pengajuan/pengajuan_";
                            GetData(request, "pengajuan",function(){
                                $("#FormEditBarang .dropdown-kategoribarang").select2({
                                    disabled: true ,
                                });
                            });
            //             });
            //         })
            //     });
            // })
        });

        var FrmTambahKategori = $("#FormAddPengajuan").validate({
            submitHandler: function(form) {
                page = "/Pengajuan/Ajax_pengajuan/pengajuan_";
                InsertData(form, function(resp) {
                    // window.open(base_url+"Pengajuan/print_form_pengajuan.html?id="+resp.Output, "","width=1050,height=580");
                    GetDropdownPengajuan('','','');
                    page = "/Pengajuan/Ajax_pengajuan/pengajuan_";
                    GetData(request, "pengajuan");
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

        $(".select2.dropdown-pengajuanbarang").change(function(event) {
            var id = $(".select2.dropdown-pengajuanbarang").val() ;
            $(".id_hidden").val(id);
        });

        var FrmPrint = $("#FormPengajuanPrint").validate({
            submitHandler: function(form) {
                window.open(base_url+"Pengajuan/print_form_pengajuan.html?id="+$(".id_hidden").val(), "","width=1050,height=580");
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


        // var FrmDeleteKategori = $("#FormDeleteBarang").validate({
        //     submitHandler: function(form) {
        //         DeleteData(form, function(resp) {
        //             page = "/Pengajuan/Ajax_pengajuan/pengajuan_";
        //             GetData(request, "barang");
        //         });
        //     },
        //     errorPlacement: function (error, element) {
        //         if (element.parent(".input-group").length) { 
        //                 error.insertAfter(element.parent());      // radio/checkbox?
        //             } else if (element.hasClass("select2") || element.hasClass("select")) {
        //                 error.insertAfter(element.next("span"));  // select2
        //             } else {                                      
        //                 error.insertAfter(element);               // default
        //             }
        //         }
        //     });

        // var FrmEditKategori = $("#FormEditBarang").validate({
        //     submitHandler: function(form) {
        //         UpdateData(form, function(resp) {
        //             request['id']='';
        //             page = "/Pengajuan/Ajax_pengajuan/pengajuan_";
        //             GetData(request, "barang");
        //         });
        //     },
        //     errorPlacement: function (error, element) {
        //         if (element.parent(".input-group").length) { 
        //                 error.insertAfter(element.parent());      // radio/checkbox?
        //             } else if (element.hasClass("select2") || element.hasClass("select")) {
        //                 error.insertAfter(element.next("span"));  // select2
        //             } else {                                      
        //                 error.insertAfter(element);               // default
        //             }
        //         }
        //     });

        $("#barang_add .dropdown-kategoribarang").on("select2:select",function(event) {
            var code = $(this).val();
            code = $('option:selected', this).attr('kode');
            $("#barang_add #kode_barang").val(code);
        });

    </script>
</body>


</html>