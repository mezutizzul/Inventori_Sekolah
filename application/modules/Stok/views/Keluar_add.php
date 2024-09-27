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
                            <div class="card">
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
                                                    <th width="25%" style="text-align: center">Barang</th>
                                                    <th width="10%" style="text-align: center">Stok</th>
                                                    <th width="25%" style="text-align: center">Jumlah</th>
                                                    <th width="25%" style="text-align: center">Satuan</th>
                                                    <th width="5%" style="text-align: center;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr data-repeater-item>
                                                    <td>
                                                        <div class="form-group ">
                                                            <select name="[id_barang]"   style="width: 100%" class="form-control select2 dropdown-barang dropdown-barang-repeater" required>
                                                                <option value="">Pilih Barang</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group ">
                                                            <input type="text" style="text-align: center;background-color: transparent !important;" id="sisa" readonly class="form-control sisa-repeater">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group ">
                                                             <input type="text" class="form-control jml-repeater no" required  name="[jml]">
                                                        </div>
                                                    </td> 
                                                    <td style="text-align: center">
                                                         <input type="hidden" class="form-control id_pelanggan-repeater"  name="[id_pelanggan]">
                                                         <input type="hidden" class="form-control keterangn-repeater no"  name="[keterangan]">
                                                         <input type="hidden" class="form-control unit-repeater" name="[unit_kerja]">
                                                        <a class="satuan-repeater" style="text-transform: uppercase;"></a>
                                                        <!-- <div class="form-group ">
                                                            <label for="jenis" class="">Jumlah</label>
                                                            <input type="text" class="form-control jml-repeater no" required  name="repeater[jml]">
                                                        </div> -->
                                                    </td> 
                                                    <td>
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
        var barang = "" ;
        var l = $(".ladda-button-submit").ladda();
        
        $(document).ready(function() {
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
            GetDropdownPelanggan('','',function(resp){
                GetDropdownBarang('','',function(resp){                
                    barang = "<option value=''>Pilih Barang</option>"+resp.lsdt ;
                    page = "/Stok/Ajax_stok/keluar_"; 
                })            
            });
            $('.table-repeater').repeater({
                show: function () {
                    $(this).slideDown();
                    $(this).find('.dropdown-barang').select2({
                         disabled: false ,
                    }).html(barang) ;
                    $(this).find('.id_pelanggan-repeater').val($(".dropdown-pelanggan").val()) ;
                    $(this).find('.unit-repeater').val($(".unit_kerja").val()) ;
                    $(this).find('.keterangn-repeater').val($(".ket").val()) ;
                },
                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement) ;
                    $(".table-repeater").find('label.error').remove();
                },
                ready: function (setIndexes) {
                }
            });
        });

        $(".dropdown-pelanggan").on('change', function(event) {
            $(".id_pelanggan-repeater").val($(this).val());
        });

        $(".unit_kerja").on('change keyup', function(event) {
            $(".unit-repeater").val($(this).val());
        });

        $(".ket").on('change keyup', function(event) {
            $(".keterangn-repeater").val($(this).val());
        }); 

        $(".btn-save-out").click(function(event) {
            $(".table-repeater").submit();
        });

        var FrmTambahKategori = $(".table-repeater").validate({
            submitHandler: function(form) {
                $("#form-out").submit();    
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

        var FormGet = $("#form-out").validate({
            submitHandler: function(form) {
                $.ajax({
                     url: '<?= base_url("Barang/Ajax_repeater/keluar.html") ?>',
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
                            
                            window.open(base_url+"Laporan/print_barang_keluar.html?kode="+ resp.kode , "",""); 
                            window.location = "<?= base_url("Stok/Keluar.html") ?>" ;
                            // cetak laporan pdf
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

        $(".datatable-keluar tbody").on("select2:select", ".dropdown-barang-repeater", function() {
            var in_this = $(this);
            var select_this = ($('option:selected', this).attr('value'))
            var repeater_barang = $("td .dropdown-barang-repeater") ;
            var index_this = (repeater_barang.index(this));
            $.each(repeater_barang, function(index, value){
                if(index != index_this && $(value).val() == select_this){
                    toastrshow("error", "Barang sudah ada di baris ke "+ parseInt(index + 1), "Error");
                    $(in_this).val("").trigger('change') ;
                 }
            });
            if(!empty(select_this)){
                var name_select = $(this).attr('name');
                $(this).parent().find('#'+name_select+"-error").html("");
             }else {
                $(this).parent().parent().parent().find('.jml-repeater').val("");
                $(this).parent().parent().parent().find('.satuan-repeater').html("");
            }
            code = $('option:selected', this).attr('satuan');
            jml = $('option:selected', this).attr('jml_sisa');
            $(this).parent().parent().parent().find('.sisa-repeater').val(jml);
            $(this).parent().parent().parent().find('.jml-repeater').val("");
            $(this).parent().parent().parent().find('.satuan-repeater').html(code);
        });

        $(".datatable-keluar tbody").on("change keyup" ,".jml-repeater",function(event) {
            isi_jumlah = parseInt($(this).val()) ;
            console.log(isi_jumlah);
            jml_1 =($(this).parent().parent().parent().find('.sisa-repeater').val());
            if(empty(jml_1) || jml_1=="NaN"){
                jml_1 = 0 ;
            }
            console.log(jml_1+"d");
            if(isi_jumlah>jml_1 && jml_1 != 0){
                $(this).val(jml_1);
            }else if(jml_1 == 0){
                $(this).val("");
            }
        });

    </script>
</body>


</html>