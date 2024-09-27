<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url("/") ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url("/") ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard PRO by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="<?= base_url("/") ?>assets/font-awesome/latest/css/font-awesome.min.css">
    <link href="<?= base_url("/") ?>assets/css/material-dashboard.minf066.css?v=2.1.0" rel="stylesheet" />
    <link href="<?= base_url("/") ?>assets/demo/demo.css" rel="stylesheet" />
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
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group pull-right">
                                            <a class="btn btn-primary btn-sm btn-fab btn-icons" data-toggle="modal" href='#add'>
                                                <i class="fa fa-plus "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-body ">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Barang</th>
                                                <th  style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="td-actions" style="text-align: center">
                                                    <a role="button" class="btn btn-info btn-round" data-original-title="" title="">
                                                        <i class="material-icons">person</i>
                                                    </a>
                                                    <a role="button" class="btn btn-success btn-round" data-original-title="" data-toggle="modal" href='#add' title="">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a role="button" class="btn btn-danger btn-round" data-original-title="" title="">
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
                                </div>
                                <div class="card-footer">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination hidden">
                                            <li class="page-item">
                                                <a class="page-link btn btn-success btn-page" style="border-radius: 4px !important" title="First" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                                                </a>
                                            </li>
                                            <li class="page-item" style="margin-right: 5px">
                                                <a class="page-link btn btn-success btn-page" style="border-radius: 4px !important" title="Previous">
                                                    <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <form id="Goto" class="navbar-form pull-right">
                                                    <input type="text" class="form-control no">
                                                </form>
                                            </li>
                                            <li class="page-item" style="margin-left: 5px">
                                                <a class="page-link btn btn-success btn-page" style="border-radius: 4px !important"  title="Next">
                                                    <span aria-hidden="true">
                                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link btn btn-success btn-page" style="border-radius: 4px !important"  title="Last">
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

    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Tambah <?= !empty($page)?$page:"kosong" ?></h4>
                </div>
                <form action="" method="POST" role="form">                    
                    <div class="modal-body">    
                        <div class="form-group bmd-form-group">
                          <label for="exampleEmail" class="bmd-label-floating">Email Address</label>
                          <input type="email" class="form-control" id="exampleEmail">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
<script src="<?= base_url("/") ?>assets/app/bawaan.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
<script src="<?= base_url("/") ?>assets/app/app.js?<?= date("Y-m-d h:i:s") ?>" type="text/javascript"></script>
<script type="text/javascript">

</script>
</body>


</html>