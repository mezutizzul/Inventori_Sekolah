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
                        <div class="col-md-6">
                            <form action="" id="add_kepala_sekolah" method="POST" class="card" role="form">
                                <div class="card-header">
                                    <input type="hidden" name="id" value="1">
                                    <div class="card-title">
                                        <h3>Kepala Sekolah</h3>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Username</label>
                                                <input type="text" required class="form-control" id="username" name="Username">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Alamat</label>
                                                <input type="text" required class="form-control" id="alamat" name="alamat">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Telp</label>
                                                <input type="tel" required class="form-control" id="telp" name="telp">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Email</label>
                                                <input type="email" name="email" required class="form-control" id="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Nama</label>
                                                <input type="text" required class="form-control" id="nama" name="nama">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">NIP</label>
                                                <input type="text" required class="form-control" id="nip" name="nip">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 col-sm-offset-12 col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <a class="btn btn-sm btn-primary" data-toggle="modal" href='#Change'>Ganti Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="" id="add_sarpras" method="POST" class="card" role="form">
                                <div class="card-header">
                                    <input type="hidden" name="id" value="2">
                                    <div class="card-title">
                                        <h3>Sarana Dan Prasarana</h3>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Username</label>
                                                <input type="text" required class="form-control" id="username" name="Username">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Alamat</label>
                                                <input type="text" required class="form-control" id="alamat" name="alamat">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Telp</label>
                                                <input type="tel" required class="form-control" id="telp" name="telp">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Email</label>
                                                <input type="email" name="email" required class="form-control" id="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">Nama</label>
                                                <input type="text" required class="form-control" id="nama" name="nama">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="jenis" class="">NIP</label>
                                                <input type="text" required class="form-control" id="nip" name="nip">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 col-sm-offset-12 col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                        <a class="btn btn-sm btn-primary" data-toggle="modal" href='#Change_sarpras'>Ganti Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Change">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Ganti Password Kepala Sekolah</h4>
                </div>
                <form action="" method="POST" role="form" id="FormPassword"> 
                    <input type="hidden" name="id" value="1">                  
                    <div class="modal-body">    
                        <div class="form-group bmd-form-group">
                            <label for="nama" class="bmd-label-floating">Password</label>
                            <input type="text" class="form-control" required name="password">
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
    <div class="modal fade" id="Change_sarpras">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Ganti Password Sarana dan Prasarana</h4>
                </div>
                <form action="" method="POST" role="form" id="FormPassword1">                    
                    <div class="modal-body">
                        <input type="hidden" name="id" value="2">    
                        <div class="form-group bmd-form-group">
                            <label for="nama" class="bmd-label-floating">Password</label>
                            <input type="text" class="form-control" required name="password">
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
        var page = "User/userwajib_";
        var image_base64 = "";
        $(document).ready(function() {
            GetDataById(reqs,function(resp){

                var kepsek = resp.Data[0] ;
                $.each(kepsek, function(index, val) {
                    $("#add_kepala_sekolah #"+index).val(val);
                });
                var sarpras = resp.Data[1] ;
                $.each(sarpras, function(index, val) {
                    $("#add_sarpras #"+index).val(val);
                });

            });
        });

        var FrmTambahKategori = $("#add_kepala_sekolah").validate({
            submitHandler: function(form) {
                var page = "User/userwajib_";
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
        var FrmTambahKategori = $("#add_sarpras").validate({
            submitHandler: function(form) {
                var page = "User/userwajib_";
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

        var FrmTambahKategori1 = $("#FormPassword1").validate({
            submitHandler: function(form) {
                var page = "User/adminpassword_";
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

        var FrmTambahKategori = $("#FormPassword").validate({
            submitHandler: function(form) {
                var page = "User/adminpassword_";
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

        </script>
    </body>


    </html>