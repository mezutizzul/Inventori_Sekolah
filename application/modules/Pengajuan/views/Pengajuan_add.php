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
    <link href="<?= base_url("/") ?>assets/js/plugins/ladda/ladda.min.css" rel="stylesheet" />
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
                        <div class="col-md-12 ">
                            <div class="card hidden">
                                <div class="card-body">
                                    <form class="row" id="form-out">
                                        <div class="form-group col-md-3" style="width: 100% ; margin-top: 0px">
                                            <label for="id_pelanggan" class="control-label">Pelanggan</label><br>
                                            <select name="[id_pelanggn" id="id_pelanggan"  style="width: 100%" class="form-control select2 dropdown-pelanggan" required>
                                                <option value="">Pilih Pelanggan</option>
                                            </select>
                                        </div>
                                        <div class="form-group  col-md-3" style="width: 100% ;">
                                             <div class="form-group ">
                                                <label for="ket" class="bmd-label-floating ">Unit Kerja</label>
                                                <input required type="text" class="form-control unit_kerja" id="ket" name="[unit_kera">
                                            </div>
                                        </div>
                                        <div class="form-group   col-md-3" style="width: 100% ;">
                                             <div class="form-group ">
                                                <label for="ket" class="bmd-label-floating ">Keterangan</label>
                                                <input type="text" class="form-control ket" id="ket" name="[keterangn">
                                            </div>
                                        </div>
                                         <div class="form-group   col-md-3" style="width: 100% ;">
                                             <div class="form-group ">
                                                <a class="text-white btn btn-sm btn-primary btn-save-out ladda-button-submit ladda-button" >Simpan</a>
                                            </div>
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
                                    <form class="table-repeater">
                                        <table class="table table-striped datatable-keluar" data-repeater-list="repeater">
                                            <thead>
                                                <tr>
                                                    <th width="15%" style="text-align: center">Nama</th>
                                                    <th width="15%" style="text-align: center">Spesifikasi</th>
                                                    <th width="10%" style="text-align: center">Jml</th>
                                                    <th width="15%" style="text-align: center">Satuan</th>
                                                    <th width="15%" style="text-align: center;">Harga</th>
                                                    <th width="15%" style="text-align: center;">Kegunaan</th>
                                                    <th width="15%" style="text-align: center;">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr data-repeater-item>
                                                    <td>
                                                        <div class="form-group ">
                                                            <input type="text" style="text-align: center;background-color: transparent !important;" id="sisa" name="barang" class="form-control barang-repeater">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group ">
                                                            <input type="text" name="spesifikasi" style="text-align: center;background-color: transparent !important;" id="sisa" class="form-control spesifikasi-repeater">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group ">
                                                             <input type="text" class="form-control jml-repeater no" required  name="jumlah">
                                                        </div>
                                                    </td> 
                                                    <td style="text-align: center">
                                                        <select name="id_satuan"  style="width: 100%" class="form-control select2 dropdown-satuanbarang" required>
                                                            <option value="">Pilih Satuan</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <div class="form-group ">
                                                             <input type="text" class="form-control harga-repeater no" required  name="harga_satuan">
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="form-group ">
                                                             <input type="text" class="form-control kegunaan-repeater"  name="kegunaan">
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="form-group ">
                                                             <input type="text" class="form-control kegunaan-repeater"  name="keterangan">
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <input type="hidden" value="<?= $this->session->userdata('user')->jurusan_id ?>" class="form-control jurusan-repeater"  name="jurusan">
                                                        <a data-repeater-delete class="btn btn-danger btn-sm btn-fab btn-icons" />
                                                            <i class="material-icons">close</i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            </tbody>
                                            <tfoot class="hidden">
                                                <tr>
                                                    <td>loding</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <a data-repeater-create class="text-white btn btn-sm btn-primary" >Tambah</a>
                                        <button type="submit" class="text-white btn btn-sm btn-primary btn-save ladda-button-submit ladda-button" >Simpan</button>
                                    </form>
                                </div>
                                <div class="card-footer pull-right">
                                    <div class="pagination-setting-keluar hidden" page="/Stok/Ajax_stok/keluar_">
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
    <!--   Core JS Files   -->
    <script src="<?= base_url("/") ?>assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/moment.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/ladda/spin.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/ladda/ladda.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/ladda/ladda.jquery.min.js"></script>
    
    <script src="<?= base_url("/") ?>assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/nouislider.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/jquery.validate.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/jquery.repeater.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/material-dashboard.minf066.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/bawaan.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/app.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script type="text/javascript">
        var page = "/Stok/Ajax_stok/keluar_";
        var satuan = "" ;
        var l = $(".ladda-button-submit").ladda();
        
        $(document).ready(function() {
            GetDropdownSatuan('','',function(resp){                
                satuan = "<option value=''>Pilih Satuan</option>"+resp.lsdt ; 
            })            
            $('.table-repeater').repeater({
                show: function () {
                    $(this).slideDown();
                    $(".jurusan-repeater").val("<?= $this->session->userdata('user')->jurusan_id ?>");
                    $(this).find('.dropdown-satuanbarang').select2({
                         disabled: false ,
                    }).html(satuan) ;
                },
                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement) ;
                    $(".table-repeater").find('label.error').remove();
                },
                ready: function (setIndexes) {
                }
            });
        });

        
        $(".btn-save-out").click(function(event) {
            $(".table-repeater").submit();
        });

        var FrmTambahKategori = $(".table-repeater").validate({
            submitHandler: function(form) {
                 $.ajax({
                     url: '<?= base_url("Barang/Ajax_repeater/pengajuan.html") ?>',
                     type: 'POST',
                     dataType: 'JSON',
                     data: $(".table-repeater").serialize() ,
                     beforeSend: function() {
                        l.ladda("start");
                     },
                     success:function(resp){
                        l.ladda("stop");
                        if(resp.IsError){
                            toastrshow("warning", resp.ErrMessage, "Warning");
                        }else{
                            
                            window.open(base_url+"Pengajuan/print_form_pengajuan.html?id="+resp.kode, "","width=1050,height=580");
                            window.location = base_url+"Pengajuan.html" ;
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