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
                            <form action="" id="add" method="POST" class="card" role="form">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Provinsi</label>
                                                <input type="text" class="form-control" id="provinsi" name="provinsi">
                                            </div>
                                        </div>
                                         <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Dinas</label>
                                                <input type="text" class="form-control" id="dinas" name="dinas">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Instansi</label>
                                                <input type="text" class="form-control" id="instansi" name="instansi">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Kota</label>
                                                <input type="text" class="form-control" id="kota" name="kota">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Kode Pos</label>
                                                <input type="text" class="form-control" id="kode_pos">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Telp</label>
                                                <input type="tel" class="form-control" id="telp" name="telp">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Fax</label>
                                                <input type="text" class="form-control" id="fax">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Website</label>
                                                <input type="text" class="form-control" id="website">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Email</label>
                                                <input type="text" class="form-control" id="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-md-3">
                                            <label for="jenis" class="">Logo</label>
                                            <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="" onerror="this.src='<?= base_url() ?>/assets/img/image_placeholder.jpg'" alt="..." class="img-view">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                                <div>
                                                    <span class="btn btn-rose btn-sm btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" class="asw">
                                                        <div class="ripple-container"></div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="hidden" name="foto" class="file_location" id="foto" class="form-control" value="" required="required" title="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 col-sm-offset-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <form id="upload_file" class="hidden">
                                <input type="hidden" class="base_64" name="FileBase64">
                                <input type="hidden" class="fileimportsiswaext-hidden" value="jpg" name="FileExtension">
                            </form>
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
    <script src="<?= base_url("/") ?>assets/js/plugins/nouislider.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/plugins/jquery.validate.min.js"></script>
    <script src="<?= base_url("/") ?>assets/js/material-dashboard.minf066.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/bawaan.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script src="<?= base_url("/") ?>assets/app/app.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
    <script type="text/javascript">
        var page = "Setting/Ajax_setting/setting_";
        var image_base64 = "";
        $(document).ready(function() {
            GetDataById(reqs,function(resp){
                $.each(resp, function(index, val) {
                    $("#"+index).val(val);
                });
                $(".img-view").attr('src', Change_file(resp.foto));

            });
        });

        var FrmTambahKategori = $("#add").validate({
            submitHandler: function(form) {
                InsertData(form, function(resp) {
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

         $(".asw").change(function () {
                var selector = $(this);
                if (!this.files || !this.files[0]) {
                    return;
                }
                var tipefile = this.files[0].type.toString();
                if(tipefile != "image/png" && tipefile != "image/jpeg" && tipefile != "image/bmp") {
                    $(this).val("");
                    toastrshow("warning", "Format salah, pilih file dengan format jpg/png/bmp", "Warning");
                    return;
                }
                // if((this.files[0].size / 1024) > 2048){
                //     $(this).val("");
                //     toastrshow("warning", "Maximum file size is 2 MB", "Warning");
                //     return;
                // }

                var FR = new FileReader();
                FR.addEventListener("load", function(readerEvent) {
                    var image = new Image();
                    image.onload = function(imageEvent) {
                        var canvas = document.createElement("canvas"),
                            max_size = 300,// TODO : pull max size from a site config
                            width = image.width,
                            height = image.height;
 
                        if (width > height) {
                            if (width > max_size) {
                                height *= max_size / width;
                                width = max_size;
                            }
                        } else {
                            if (height > max_size) {
                                width *= max_size / height;
                                height = max_size;
                            }
                        }
                        canvas.width = width;
                        canvas.height = height;
                        canvas.getContext("2d").drawImage(image, 0, 0, width, height);

                        var base64 = canvas.toDataURL("image/jpeg");
                        image_base64 = base64 ;
                        base64 = base64.replace(/^data:image\/(png|jpg|jpeg|bmp);base64,/, '');
                        with_photo = true;
                        $(".base_64").val(base64) ;
                        $("#upload_file").submit();
                    };
                    image.src = readerEvent.target.result;
                }); 
                FR.readAsDataURL(this.files[0]);     
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
                                toastrshow("success", "gambar terupload" , "Success");
                                $("#foto").val(resp.Output) ;
                                $(".img-view").attr('src', image_base64) ;
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