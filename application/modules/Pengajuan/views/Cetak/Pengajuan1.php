<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <link href="<?= base_url("/") ?>assets/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url("/") ?>assets/app/app.css?<?= date("Y-m-d h:i:s") ?>" rel="stylesheet" />
    <style>
        @media print{
            @page {
                size: A4 landscape;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */
                margin-top: 10mm;
            }
            body {
                margin-top: 5px;
            }
        }
        .table{
            margin-bottom: 0px;
            overflow:hidden;
        }
        body {
            border-color: grey !important;
            font-size: 12px;
        }

        hr{
            border: 0;
            border-top: 1px solid black;
            border-bottom: 0;
            margin: 2px 0;
        }

        .wrapper{
            margin: auto;
            width: 700px;
        }
        .line-ttd:before {
            content: "";
            border-bottom: 1px solid black;
            width: 160px;
            position: absolute;
            bottom: 0px;
            left: 15px;
        }
        .footer{
            position: absolute;
            bottom: 0px ;
            width: 700px
        }
        @page {margin: 0px 3px 3px 3px; }
    </style>
</head>

<body class="">
    <div class="wrapper ">
        <div class="row" style="margin-top: 20px">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            </div>
        </div>

        <center>-  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  <span style="font-size: 15px; font-weight: bold;">Data Pengajuan Barang</span>  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  - </center>
        
        <?php 
        $id = $this->input->get('id');
        if(empty($id)){
            echo "<script>     </script>";
        }
        ?>
        <div class="table-responsive">

            <table class="table" border="2">

                <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Spesifikasi</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Kegunaan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // $this->db->where_in('id ', $id);
                    // $data = $this->db->get('view_pengajuan');
                    $data = $this->db->query('select * from view_pengajuan where kode_id = "'.$id.'"');
                    $this->db->query('update pengajuan set status=3 where kode_id = "'.$id.'"');
                    if(empty($data->result())){
                        echo "<script>   window.close();  </script>";               
                    }else{
                        foreach ($data->result() as $key => $value) {
                            echo '
                            <tr>
                            <th>'.($key+1).'</th>
                            <th>'.$value->barang.'</th>
                            <th>'.$value->spesifikasi.'</th>
                            <th>'.$value->jumlah.'</th>
                            <th>'.$value->satuan_barang.'</th>
                            <th>'.$value->harga_satuan.'</th>
                            <th>'.$value->kegunaan.'</th>
                            <th>'.$value->Keterangan.'</th>
                            </tr>
                            ';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="" style="">
            <table class="table">
                    <tr>
                        <th class="text-center">Mengetahui</th>
                        <th class="text-center">Mengetahui</th>
                        <th class="text-center">Mengetahui</th>
                        <th class="text-center">Mengetahui</th>
                    </tr> 
                    <tr height="60px" style="border:none;">
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <?php 
                                $s = $this->session->userdata('user');
                            ?>
                            Kabeng <?= $this->session->userdata('user')->jurusan; ?>
                            <br>
                            <?= $this->db->get_where("user_jurusan",array("jurusan"=>$s->jurusan ,"jabatan"=>"kabeng"))->result()[0]->nama; ?><br> 
                            Nip: <?= $this->db->get_where("user_jurusan",array("jurusan"=>$s->jurusan ,"jabatan"=>"kabeng"))->result()[0]->nip; ?> 
                        </td>
                        <td class="text-center">Kaprokal <?= $this->session->userdata('user')->jurusan; ?>
                            <br>
                            <?= $this->db->get_where("user_jurusan",array("jurusan"=>$s->jurusan ,"jabatan"=>"kaprokal"))->result()[0]->nama; ?><br> 
                            Nip: <?= $this->db->get_where("user_jurusan",array("jurusan"=>$s->jurusan ,"jabatan"=>"kaprokal"))->result()[0]->nip; ?> 

                        </td>
                        <td class="text-center">Sarpras
                            <br>
                            <?= $this->db->get_where("user_wajib",array("id"=>2))->result()[0]->nama; ?><br> 
                            Nip: <?= $this->db->get_where("user_wajib",array("id"=>2))->result()[0]->nip; ?> 
                        </td>
                        <td class="text-center">Kepala Sekolah
                            <br>
                            <?= $this->db->get_where("user_wajib",array("id"=>1))->result()[0]->nama; ?><br> 
                            Nip: <?= $this->db->get_where("user_wajib",array("id"=>1))->result()[0]->nip; ?> 
                        </td>
                    </tr>
            </table>
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
        $(document).ready(function() {
            window.print();
            window.close();
        });


    </script>
</body>


</html>