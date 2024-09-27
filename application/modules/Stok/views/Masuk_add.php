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
                                            <label for="id_suplier" class="control-label">Suplier</label><br>
                                            <select name="" id="id_suplier"  style="width: 100%" class="form-control select2 dropdown-supplier" required>
                                                <option value="">Pilih Supplier</option>
                                            </select>
                                        </div>   
                                         <div class="form-group col-md-3" style="width: 100% ;">
                                            <!-- <label for="d" class="control-label">Suplier</label><br>  -->
                                            
                                            <a class="text-white btn btn-sm btn-primary btn-save-out ladda-button-submit ladda-button"  style="margin-top: 20px" data-style="slide-up">Simpan</a>
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
                                                    <th width="20%" style="text-align: center">Jumlah</th>
                                                    <th width="10%" style="text-align: center">Satuan</th>
                                                    <th width="" style="text-align: center">Keterangan</th>
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
                                                             <input type="text" class="form-control jml-repeater no" required  name="[jml]">
                                                        </div>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <div class="form-group ">
                                                            <a class="satuan-repeater" style="text-transform: uppercase;"></a>
                                                        </div>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"    name="[keterangan]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" class="form-control id_supplier-repeater"  name="[id_supplier]">
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
                                        <button type="submit" class="text-white btn btn-sm btn-primary  btn-save save-masuk ladda-button ladda-button-submit" data-style="slide-up" >Simpan</button>
                                    </form>
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
        // $(".select2").select2();
        
        $(document).ready(function() {
            GetDropdownSupplier('','',function(resp){
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
                    if($("#form-out .dropdown-supplier").val()!=""){
                        $(this).find('.id_supplier-repeater').val($("#form-out .dropdown-supplier").val());
                    }
                },
                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement) ;
                    $(".table-repeater").find('label.error').remove();
                },
                ready: function (setIndexes) {
                }
            });
        });

        $(".dropdown-supplier").on('change', function(event) {
            $(".id_supplier-repeater").val($(this).val());
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
                     url: '<?= base_url("Barang/Ajax_repeater/masuk.html") ?>',
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
                            
                            window.open(base_url+"Laporan/print_barang_masuk.html?kode="+ resp.kode , "",""); 
                            window.location = "<?= base_url("Stok/Masuk.html") ?>" ;
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
                 $(this).parent().parent().parent().find('.satuan-repeater').html("");
            }
            code = $('option:selected', this).attr('satuan');
            jml = $('option:selected', this).attr('jml_sisa');
            $(this).parent().parent().parent().find('.sisa-repeater').val(jml);
            $(this).parent().parent().parent().find('.satuan-repeater').html(code);
        });

    </script>
</body>


</html>