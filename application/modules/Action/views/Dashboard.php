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
    <style type="text/css">
        .card-title{
            /*padding-bottom: 20px*/
        }
        .card-icon{
            padding: 0px !important
        }
    </style>
</head>
<?php 
    $data = $this->db->query("SELECT
    COALESCE(sum(stok_masuk),0) AS barang_masuk,
    COALESCE(sum(stok_keluar),0) AS barang_keluar,
    COALESCE(sum(stok_akhir),0) AS total_barang ,
    (SELECT COUNT(id) from supplier) as total_supplier ,
    (SELECT COUNT(id) from pelanggan) as total_pelanggan
    FROM
    view_barang")->result()[0];
?>
<body class="">
    <div class="wrapper ">
        <?php $this->load->view('Sidebar');  ?>
        <div class="main-panel">
            <?php $this->load->view('Header');  ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                            <div class="portlet-body">
                                                <center>
                                                    <label style="font-size: 18px;color : black" class="bold margin-bottom-10">SOFTWARE INVENTORY GUDANG SMK NEGERI 4 MALANG</label>
                                                </center>
                                                <center>
                                                    <img style="width: 30%" class="foto-sekolah" onerror="this.src='<?= base_url("/") ?>assets/img/logo.png'" src="<?= base_url("/") ?>assets/img/logo.png">
                                                    <br>
                                                    <table class="table table-hover" width="80%">
                                                        <tbody>
                                                            <tr>
                                                                <td>Alamat</td>
                                                                <td class="bold">Jl .Tanimbar No. 22 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Telp</td>
                                                                <td class="bold">0341- 353798</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Website</td>
                                                                <td class="bold">http://www.smkn4malang.sch.id</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td class="bold">mail@smkn4malang.sch.id</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </center>
                                                
                                                
                                            </div>            
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card card-stats">
                                                    <div class="card-header card-header-success card-header-icon">
                                                        <div class="card-icon">
                                                            <i class="material-icons">arrow_downward</i>
                                                        </div>
                                                        <p class="card-category">Barang Masuk</p>
                                                        <h3 class="card-title total-masuk">
                                                            <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card card-stats">
                                                    <div class="card-header card-header-danger card-header-icon">
                                                        <div class="card-icon">
                                                            <i class="material-icons">arrow_upward</i>
                                                        </div>
                                                        <p class="card-category">Barang Keluar</p>
                                                        <h3 class="card-title total-keluar">
                                                            <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card card-stats">
                                                    <div class="card-header card-header-primary card-header-icon">
                                                        <div class="card-icon">
                                                            <i class="material-icons">all_inbox</i>
                                                        </div>
                                                        <p class="card-category">Total Semua Barang</p>
                                                        <h3 class="card-title total-barang">
                                                            <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card card-stats">
                                                    <div class="card-header card-header-default card-header-icon">
                                                        <div class="card-icon">
                                                            <i class="material-icons">people_outline</i>
                                                        </div>
                                                        <p class="card-category">Total Pengguna</p>
                                                        <h3 class="card-title total-pelanggan">
                                                            <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card card-stats">
                                                    <div class="card-header card-header-primary card-header-icon">
                                                        <div class="card-icon">
                                                            <i class="material-icons">business_center</i>
                                                        </div>
                                                        <p class="card-category">Total Supplier</p>
                                                        <h3 class="card-title total-supplier">
                                                            <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>               
                                        </div>               
                                    </div>           
                                </div>
                            </div>
                            <div class="row hidden">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-success card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">arrow_downward</i>
                                            </div>
                                            <p class="card-category">Barang Masuk</p>
                                            <h3 class="card-title total-masuk">
                                                <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-danger card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">arrow_upward</i>
                                            </div>
                                            <p class="card-category">Barang Keluar</p>
                                            <h3 class="card-title total-keluar">
                                                <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-primary card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">all_inbox</i>
                                            </div>
                                            <p class="card-category">Total Semua Barang</p>
                                            <h3 class="card-title total-barang">
                                                <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-default card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">people_outline</i>
                                            </div>
                                            <p class="card-category">Total Pengguna</p>
                                            <h3 class="card-title total-pelanggan">
                                                <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-primary card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">business_center</i>
                                            </div>
                                            <p class="card-category">Total Supplier</p>
                                            <h3 class="card-title total-supplier">
                                                <i class="fa fa-spin fa-refresh" style="color: black"></i>
                                            </h3>
                                        </div>
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
        var page = "/Action/Ajax_action/barang_";
        $(document).ready(function() {
            $(".select2.dropdown-satuanbarang ,.select2.dropdown-pelanggan ,.select2.dropdown-kategoribarang ,.select2.dropdown-kategori ").select2({
                // disabled: true ,
                // placeholder: "Loading",
            });

            setTimeout(function() {
                $(".total-supplier").html("<?= $data->total_supplier ?>") ;
                $(".total-masuk").html("<?= $data->barang_masuk ?>")    ;
                $(".total-keluar").html("<?= $data->barang_keluar ?>")   ;
                $(".total-barang").html("<?= $data->total_barang ?>")   ;
                $(".total-pelanggan").html("<?= $data->total_pelanggan ?>"); 
            }, 1000);

            $('.tgl_peminjaman').datetimepicker({
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
        });

        var FrmTambahKategori = $("#FormPeminjaman").validate({
            submitHandler: function(form) {
                page = "/Action/Ajax_action/peminjaman_";
                InsertData(form, function(resp) {
                    page = "/Action/Ajax_action/barang_";
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

        var FrmTambahKategori = $("#FormAddPelanggan").validate({
            submitHandler: function(form) {
                page = "/Action/Ajax_action/pelanggan_";
                InsertData(form, function(resp) {
                    page = "/Action/Ajax_action/pelanggan_";
                    GetDropdownPelanggan('','','');
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

        // var FrmDeleteKategori = $("#FormDeleteBarang").validate({
        //     submitHandler: function(form) {
        //         DeleteData(form, function(resp) {
        //             page = "/Action/Ajax_action/barang_";
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
        //             page = "/Action/Ajax_action/barang_";
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