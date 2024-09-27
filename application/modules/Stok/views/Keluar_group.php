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
        label.error{
            color: #f44336;
        }
    </style>
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
                            <form id="FormSearch1" page="/Stok/Ajax_stok/keluargroup_" class="form-inline pull-right" table="keluar" role="form">
                                <div class="form-group ">
                                    <label for="jenis" class="bmd-label-floating">Cari Barang Keluar</label>
                                    <input type="text" class="form-control" id="jenis" name="form[search]">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm btn-fab btn-icons"><i class="fa fa-search"></i></button>
                                <div class="form-group  pull-right">
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons refresh" href="" >
                                        <i class="fa fa-refresh"></i>
                                    </a> 
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons" href='<?= base_url("Stok/Keluar_add.html") ?>'>
                                        <i class="fa fa-plus "></i>
                                    </a>
                                </div>
                            </form>
                            
                            <div class="card">
                                <div class="card-body">
                                    <form class="row" id=filter>
                                        <div class="form-group col-md-3" style="width: 100% ; margin-top: 0px">
                                            <label for="id_pelanggan" class="control-label">Pelanggan</label><br>
                                            <select name="[id_pelanggn" id="id_pelanggan"  style="width: 100%" class="form-control select2 dropdown-pelanggan" required>
                                                <option value="">Pilih Pelanggan</option>
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
                                    <table class="table table-striped datatable-keluar">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Keluaran</th>
                                                <th>Pelanggan</th>
                                                <th>Unit Kerja</th>
                                                <th>Tgl keluar</th>
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
                                    <div class="pagination-setting-keluar hidden" page="/Stok/Ajax_stok/keluargroup_">
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
    <div class="modal fade" id="keterangan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Keterangan</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detail_keluar" width="1000px">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">List Barang Keluar</h4>
                </div>
                <div class="modal-body" style="max-height:350px !important ; overflow-y: auto">
                    <table class="table table-hover  datatable-detail-keluar">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah(Satuan)</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
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
        var page = "/Stok/Ajax_stok/keluargroup_";
        $(document).ready(function() {
            $(".select2").select2({
                disabled: true ,
                placeholder: "Loading",
            });
            $('.tgl_keluar').datetimepicker({
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

            $("#FormSearch1").submit(function() {
                var table = $(this).attr("table");
                request["id_pelanggan"]= $("#filter .dropdown-pelanggan").val();
                request["Page"] = 1;
                request["search"] =  $(this).find("input[type='text']").val() ;
                page = $(this).attr("page");
                GetData(request, table, getfunc);
                return false;
            }); 
            GetDropdownPelanggan('','',function(resp){                
                page = "/Stok/Ajax_stok/keluargroup_";
                request["Sort"] = "id desc" ;
                GetData(request, "keluar"); 
            })            
            
        });

        $("#filter .dropdown-pelanggan").change(function(){
            $('#FormSearch1').submit();
        });

        $("#barang_add .dropdown-kategoribarang").on("select2:select",function(event) {
            var code = $(this).val();
            code = $('option:selected', this).attr('kode');
            $("#barang_add #kode_barang").val(code);
        });

    </script>
</body>


</html>