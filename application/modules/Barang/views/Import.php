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
        textarea{
            overflow-y: hidden ;
            overflow-x: hidden ;
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
                            <form class="form-inline pull-right" table="barang" role="form">
                                <div class="form-group  pull-right">
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons refresh" href="" >
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-fab btn-icons" data-toggle="modal" href='#import' >
                                        <i class="fa fa-file"></i>
                                    </a>
                                    <a type="submit" class="text-white btn btn-sm btn-primary btn-save save-siswaimport save-siswaimport-out hidden ladda-button ladda-button-submit" data-style="slide-up" >Simpan</a>
                                </div>
                            </form>

                            <div class="card  notifikasi hidden" style="max-height: 200px ; overflow-y: auto;">
                                <div class="card-body">
                                    
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Set Default -
                                        <small class="description">Dropdown</small>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form class="row" id="form-out">
                                        <div class="form-group col-md-3" style="width: 100% ; margin-top: 0px">
                                            <label for="id_kategori" class="control-label">Katogori Barang</label><br>
                                            <select name="id_kategori" id="id_kategori"  style="width: 100%" class="form-control select2 dropdown-kategoribarang" required>
                                                <option value="">Pilih Kategori</option>
                                            </select>
                                        </div> 
                                        <div class="form-group col-md-3" style="width: 100% ; margin-top: 0px">
                                            <label for="id_satuan" class="control-label">Satuan Barang</label><br>
                                            <select name="id_satuan" id="id_satuan"  style="width: 100%" class="form-control select2 dropdown-satuanbarang" required>
                                                <option value="">Pilih Satuan</option>
                                            </select>
                                        </div> 
                                        <div class="form-group col-md-3" style="width: 100% ; margin-top: 0px">
                                            <label for="id_sumber" class="control-label">Sumber Barang</label><br>
                                            <select name="id_sumber" id="id_sumber"  style="width: 100%" class="form-control select2 dropdown-sumberbarang" required>
                                                <option value="">Pilih Sumber Barang</option>
                                            </select>
                                        </div> 
                                         <div class="form-group col-md-3 hidden" style="width: 100% ;">
                                            <!-- <label for="d" class="control-label">Suplier</label><br>  -->
                                            
                                            <a class="text-white btn btn-sm btn-primary btn-save-out" style="margin-top: 20px">Simpan</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-body table-responsive">
                                    <div class="row">
                                        <div class="col-md-12 loading-file">
                                            <?php 
                                                if(empty($this->input->post('file'))){
                                                    echo '<center><div class="alert alert-danger">
                                                             <strong>File Tidak Ada </strong>  ...
                                                         </div></center>' ;        
                                                }else{
                                                    echo '<center><img class="loading-gif-image" ></center>
                                                            <center class="load-data-import"> Loading ...</center>
                                                    ' ;
                                                }
                                             ?>     
                                        </div>
                                    </div>
                                    <form class="table-repeater hidden">
                                        <table class="table table-striped table-responsive datatable-import" data-repeater-list="repeater">
                                            <thead>
                                                <tr>
                                                    <th width="15%" style="text-align: center">Nama</th>
                                                    <th width="10%" style="text-align: center">Kode Barang</th>
                                                    <th width="10%" style="text-align: center">Stok Awal</th>
                                                    <th width="15%" style="text-align: center">Spesifikasi</th>
                                                    <th width="15%" style="text-align: center">Kategori</th>
                                                    <th width="15%" style="text-align: center">Satuan</th>
                                                    <th width="15%" style="text-align: center">Sumber</th>
                                                    <th width="5%" style="text-align: center;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr data-repeater-item>
                                                    <td>
                                                        <div class="form-group ">
                                                            <textarea type="text" class="form-control kode-repeater" required  name="[nama]">
                                                            </textarea>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="form-group ">
                                                             <input placeholder="Kode" type="text" class="form-control kode-repeater" required  name="[kode_barang]">
                                                        </div>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <div class="form-group ">
                                                             <input placeholder="Jumlah" type="text" class="form-control .input-group jml-repeater no" required  name="[stok_awal]">
                                                        </div>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <div class="form-group ">
                                                             <input placeholder="Spesifikasi" type="text" class="form-control spek-repeater"  name="[spesifikasi]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group ">
                                                            <select name="[id_kategori]"   style="width: 100%" class="form-control select2 dropdown-kategoribarang dropdown-kategoribarang-repeater" required>
                                                                <option value="">Pilih Kategori</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group ">
                                                            <select name="[id_satuan]"   style="width: 100%" class="form-control select2 dropdown-satuanbarang dropdown-satuanbarang-repeater" required>
                                                                <option value="">Pilih Satuan</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group ">
                                                            <select name="[id_sumber]"   style="width: 100%" class="form-control select2 dropdown-sumberbarang dropdown-sumberbarang-repeater" required>
                                                                <option value="">Pilih Sumber</option>
                                                            </select>
                                                        </div>
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
                                        <a data-repeater-create class="text-white btn btn-sm btn-primary btnTambah save-siswaimport hidden" >Tambah</a>
                                        <button type="submit" class="text-white btn btn-sm btn-primary btn-save save-siswaimport hidden ladda-button ladda-button-submit" data-style="slide-up" >Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!--   Core JS Files   -->
    <script src="<?= base_url("/") ?>assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/moment.min.js"></script>

    <script src="<?= base_url("/") ?>assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/nouislider.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/jquery.validate.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/jquery.repeater.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/ladda/spin.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/ladda/ladda.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/ladda/ladda.jquery.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/material-dashboard.minf066.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/bawaan.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/app.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script type="text/javascript">
        var page = "/Tool/reader_";
        var Kategori = "" ;
        var Satuan = "" ;
        var Sumber = "" ;
        var i =1 ;
        var l = $(".ladda-button-submit").ladda();
        $('.table-repeater').repeater({
            show: function () {
                $(this).slideDown();
                $(this).find('.dropdown-kategoribarang').select2({
                     disabled: false ,
                }).html(Kategori) ;
                $(this).find('.dropdown-satuanbarang').select2({
                     disabled: false ,
                }).html(Satuan) ;
                $(this).find('.dropdown-sumberbarang').select2({
                     disabled: false ,
                }).html(Sumber) ;
            },
            hide: function (deleteElement) {
                $(this).slideUp(deleteElement) ;
                $(".table-repeater").find('label.error').remove();
            },
            ready: function (setIndexes) {
            }
        });
        // $(".select2").select2();
        var file = "<?= $_POST['file'] ?>" ;
        var form_repeater = $(".table-repeater") ;
        $(document).ready(function() {
            GetDropdownKategori('','',function(resp){
                Kategori =  "<option value=''>Pilih Kategori</option>"+resp.lsdt ;
                GetDropdownSatuan('','',function(resp){
                    Satuan = "<option value=''>Pilih Satuan</option>"+resp.lsdt ;
                    GetDropdownSumber('','',function(resp){
                        Sumber = "<option value=''>Pilih Sumber</option>"+resp.lsdt ;
                        if(!empty(file)){
                            set_table(file,form_repeater);
                        }
                    });
                })
            });
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


        function set_table(file , FrmSave){
            GetDataById({"file":file},function(resp){
                if(resp.IsError == true) {
                        toastrshow("error", resp.ErrMessage, "Error");
                    } else {
                        var jumdata = (resp.Data.length - 1);
                        $.each(resp.Data, function(index, item) {
                            var id_kategori = FrmSave.find("select[name='repeater["+index+"][id_kategori]']").find('option:contains('+item.kategori+')').attr("value");
                            var id_satuan = FrmSave.find("select[name='repeater["+index+"][id_satuan]']").find('option:contains('+item.satuan+')').attr("value");
                            if(index < jumdata) {
                                console.log(item.nama);
                                $(".btnTambah").click();
                                FrmSave.find("textarea[name='repeater["+index+"][nama]']").val(item.nama);
                                FrmSave.find("input[name='repeater["+index+"][spesifikasi]']").val(item.spesifikasi);
                                FrmSave.find("input[name='repeater["+index+"][kode_barang]']").val(item.kode_barang);
                                FrmSave.find("input[name='repeater["+index+"][stok_awal]']").val(item.stok);
                            } else {
                                FrmSave.find("textarea[name='repeater["+index+"][nama]']").val(item.nama);
                                FrmSave.find("input[name='repeater["+index+"][spesifikasi]']").val(item.spesifikasi);
                                FrmSave.find("input[name='repeater["+index+"][kode_barang]']").val(item.kode_barang);
                                FrmSave.find("input[name='repeater["+index+"][stok_awal]']").val(item.stok);
                                
                            }
                            if(!empty(id_kategori)){
                                FrmSave.find("select[name='repeater["+index+"][id_kategori]']").val(id_kategori).trigger('change');
                            }
                            if(!empty(id_satuan)){
                                FrmSave.find("select[name='repeater["+index+"][id_satuan]']").val(id_satuan).trigger('change');
                            }

                        });
                        $(".save-siswaimport , .table-repeater").removeClass("hidden");
                        $(".loading-file").addClass('hidden');
                    }
            })
        }

        $("#form-out .dropdown-kategoribarang").change(function(event) {
            $(".table-repeater").find('.dropdown-kategoribarang-repeater').val($(this).val()).trigger('change');
        });

        $("#form-out .dropdown-satuanbarang").change(function(event) {
            $(".table-repeater").find('.dropdown-satuanbarang-repeater').val($(this).val()).trigger('change');
        });

        $(".save-siswaimport-out").click(function(event) {
           $(".table-repeater").submit();
        });

        $("#form-out .dropdown-sumberbarang").change(function(event) {
            $(".table-repeater").find('.dropdown-sumberbarang-repeater').val($(this).val()).trigger('change');
        });

        $(".btn-save-out").click(function(event) {
            $(".table-repeater").submit();
        });

        var FrmTambahKategori = $(".table-repeater").validate({
            submitHandler: function(form) {
                $.ajax({
                     url: '<?= base_url("Barang/Ajax_repeater/barang.html") ?>',
                     type: 'POST',
                     dataType: 'JSON',
                     data: $(form).serialize() ,
                     beforeSend: function() {
                        l.ladda("start");
                     },
                     success:function(resp){
                        l.ladda("stop");
                        if(resp.IsError){
                            toastrshow("warning", resp.ErrMessage, "Warning");
                        }else{
                           $.each(resp.repeater, function(index, val) {
                                if(val.IsError){
                                    erro = alert_error(val.ErrMessage) ;    
                                    $(".notifikasi .card-body").append(erro) ;
                                    $(".notifikasi").removeClass('hidden');
                                    $(".table-repeater tbody tr").eq(index).attr("style","background-color:#FFC2E2");
                                }else{
                                    $(".table-repeater tbody tr").eq(index).attr("style","background-color:#B892FF");
                                    $(".table-repeater tbody tr").eq(index).find("input").attr('disabled', 'true');;
                                    $(".table-repeater tbody tr").eq(index).find("select").attr('disabled', 'true');;
                                    $(".table-repeater tbody tr").eq(index).find("input").attr('readonly', 'true');;
                                    $(".table-repeater tbody tr").eq(index).find("select").attr('readonly', 'true');;
                                }
                            }); 
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


        function alert_error(message){
            return '<div class="alert alert-sm alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error - </strong> '+ message +'</div>';
        }


    </script>
</body>


</html>