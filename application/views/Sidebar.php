<?php 
    $s = $this->session->userdata('user');
    $l = $this->session->userdata('level');
?>
<div class="sidebar" data-color="rose" data-background-color="black" data-image="<?= base_url("/") ?>assets/img/login.jpg">
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <div class="photo">
                <img src="<?= base_url("/") ?>assets/img/logo.png" width="100%"/>
            </div>
        </a>
        <a href="" class="simple-text logo-normal">
            Inventori
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="<?= base_url("/") ?>assets/img/default-avatar.png" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        <?= $this->session->userdata('user')->nama ; ?>
                    </span>
                </a> 
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item <?= $dashboard ?'active':'' ?>">
                <a class="nav-link" href="<?= base_url("Dashboard.html") ?>">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item <?= $l!=5?'hidden':'' ?> <?= $Barang?'active':'' ?>" >
                <a class="nav-link" data-toggle="collapse" href="#fiturbarang">
                    <i class="material-icons">business_center</i>
                    <p> Setup Awal
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?= $Barang?'show':'' ?>" id="fiturbarang">
                    <ul class="nav">
                        <li class="nav-item <?= $jenis_barang?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Barang/Jenis.html") ?>">
                                <span class="sidebar-mini"> KB </span>
                                <span class="sidebar-normal"> Kategori Barang </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $satuan_barang?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Barang/Satuan.html") ?>">
                                <span class="sidebar-mini"> ST </span>
                                <span class="sidebar-normal"> Satuan Barang </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $sumber_barang?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Barang/Sumber.html") ?>">
                                <span class="sidebar-mini"> SB </span>
                                <span class="sidebar-normal"> Sumber Dana </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $manage?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Barang.html") ?>">
                                <span class="sidebar-mini"> MB </span>
                                <span class="sidebar-normal"> Manage Barang </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $Supplier?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Stok/Supplier.html") ?>">
                                <span class="sidebar-mini"> Sp </span>
                                <span class="sidebar-normal"> Supplier </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $Bidang?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Bidang_keahlian.html") ?>">
                                <span class="sidebar-mini"> BJ </span>
                                <span class="sidebar-normal"> Bidang Keahlian </span>
                            </a>
                        </li><li class="nav-item <?= $Jurusan?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Jurusan.html") ?>">
                                <span class="sidebar-mini"> JR </span>
                                <span class="sidebar-normal"> Jurusan </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $l!=5?'hidden':'' ?> <?= $user_admin?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("User/admin.html") ?>">
                                <span class="sidebar-mini"> AD </span>
                                <span class="sidebar-normal"> Admin </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $l!=5?'hidden':'' ?> <?= $user_wajib?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("User/user_wajib.html") ?>">
                                <span class="sidebar-mini"> UW </span>
                                <span class="sidebar-normal"> User Wajib </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $l!=5?'hidden':'' ?> <?= $user_jurusan?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("User/user_jurusan.html") ?>">
                                <span class="sidebar-mini"> UJ </span>
                                <span class="sidebar-normal"> User Jurusan </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $pelanggan?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Action/Pelanggan.html") ?>">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal"> Pelanggan </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li> 
            <li class="nav-item <?= $l!=5?'hidden':'' ?> <?= $Stok?'active':'' ?>" >
                <a class="nav-link" data-toggle="collapse" href="#fiturstok">
                    <i class="material-icons">apps</i>
                    <p> Transaksi
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?= $Stok?'show':'' ?>" id="fiturstok">
                    <ul class="nav">
                        
                       <!--  <li class="nav-item <?= $barang_masuk?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Stok/Masuk.html") ?>">
                                <span class="sidebar-mini"> BM </span>
                                <span class="sidebar-normal"> Barang Masuk </span>
                            </a>
                        </li> -->
                        <li class="nav-item <?= $barang_masuk?'active':'' ?>">
                            <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                                <span class="sidebar-mini"> BM </span>
                                <span class="sidebar-normal"> Barang Masuk
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <div class="collapse <?= $barang_masuk?'show':'' ?>"" id="componentsCollapse">
                                <ul class="nav">
                                    <li class="nav-item <?= $barang_barang?'active':'' ?>"">
                                        <a class="nav-link" href="<?= base_url("Stok/Masuk.html") ?>">
                                            <span class="sidebar-mini">B</span>
                                            <span class="sidebar-normal"> Perbarang </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $barang_group?'active':'' ?>"">
                                        <a class="nav-link" href="<?= base_url("Stok/MasukList.html") ?>">
                                            <span class="sidebar-mini">P</span>
                                            <span class="sidebar-normal"> Pernomor penerimaan </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li class="nav-item <?= $barang_keluar?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Stok/Keluar.html") ?>">
                                <span class="sidebar-mini"> BK </span>
                                <span class="sidebar-normal"> Barang Keluar </span>
                            </a>
                        </li> -->
                        <li class="nav-item <?= $barang_masuk?'active':'' ?>">
                            <a class="nav-link" data-toggle="collapse" href="#Keluar_list">
                                <span class="sidebar-mini"> BK </span>
                                <span class="sidebar-normal"> Barang Keluar
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <div class="collapse <?= $barang_keluar?'show':'' ?>" id="Keluar_list">
                                <ul class="nav">
                                    <li class="nav-item <?= $bk_list?'active':'' ?>"">
                                        <a class="nav-link" href="<?= base_url("Stok/Keluar.html") ?>">
                                            <span class="sidebar-mini">B</span>
                                            <span class="sidebar-normal"> Perbarang </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $bkg_list?'active':'' ?>"">
                                        <a class="nav-link" href="<?= base_url("Stok/KeluarList.html") ?>">
                                            <span class="sidebar-mini">P</span>
                                            <span class="sidebar-normal"> Pernomor Keluaran </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item <?= $Stok_barang?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Stok.html") ?>">
                                <span class="sidebar-mini"> SB </span>
                                <span class="sidebar-normal"> Stok Barang </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item hidden <?= $l!=5?'hidden':'' ?> <?= $pinjam?'active':'' ?>" >
                <a class="nav-link" data-toggle="collapse" href="#fiturpinjam">
                    <i style="font-size: 18px" class="fa fa-check"></i>
                    <p> Peminjaman
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?= $pinjam?'show':'' ?>" id="fiturpinjam">
                    <ul class="nav">
                        <li class="nav-item <?= $pelanggan?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Action/Pelanggan.html") ?>">
                                <span class="sidebar-mini"> LP </span>
                                <span class="sidebar-normal"> List Pelanggan </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $stok_barang_full?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Action/List_barang.html") ?>">
                                <span class="sidebar-mini"> LB </span>
                                <span class="sidebar-normal"> List Barang </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $peminjaman?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Action/Pinjam.html") ?>">
                                <span class="sidebar-mini"> PJ </span>
                                <span class="sidebar-normal"> Peminjaman </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $pengembalian?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Action/Kembali.html") ?>">
                                <span class="sidebar-mini"> PK </span>
                                <span class="sidebar-normal"> Pengembalian </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?= $l==4|| $l==3?'hidden':'' ?> <?= $Lapor?'active':'' ?>" >
                <a class="nav-link" data-toggle="collapse" href="#fiturlapor">
                    <i style="font-size: 18px" class="fa fa-file"></i>
                    <p> Laporan
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?= $Lapor?'show':'' ?>" id="fiturlapor">
                    <ul class="nav">
                        <li class="nav-item <?= $lap_stok?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Laporan/Stok_barang.html") ?>">
                                <span class="sidebar-mini"> LS </span>
                                <span class="sidebar-normal"> Laporan Stok Barang </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $lap_perbarang?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Laporan/per_barang.html") ?>">
                                <span class="sidebar-mini"> LSB </span>
                                <span class="sidebar-normal"> Stok Per Barang </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $lap_perwaktu?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Laporan/per_waktu.html") ?>">
                                <span class="sidebar-mini"> LBW </span>
                                <span class="sidebar-normal"> Stok Per Waktu </span>
                            </a>
                        </li>
                        <li class="nav-item hidden <?= $lap_peminjaman?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Laporan/Peminjaman.html") ?>">
                                <span class="sidebar-mini"> PK </span>
                                <span class="sidebar-normal"> Pelanggan Unit Kerja </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?= $l==5 || $l==1?'hidden':'' ?> <?= $pengajuan?'active':'' ?>" >
                <a class="nav-link" data-toggle="collapse" href="#pengajuan">
                    <i class="material-icons">description</i>
                    <p> Pengajuan
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?= $pengajuan?'show':'' ?>" id="pengajuan">
                    <ul class="nav">
                        <li class="nav-item <?= $l!=4?'hidden':'' ?> <?= $list?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Pengajuan.html") ?>">
                                <span class="sidebar-mini"> PL </span>
                                <span class="sidebar-normal"> Pengajuan List </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $l!=3?'hidden':'' ?> <?= $kaprokal?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Pengajuan/Kaprokal.html") ?>">
                                <span class="sidebar-mini"> PL </span>
                                <span class="sidebar-normal"> Pengajuan(Kaprokal) </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $l!=2?'hidden':'' ?> <?= $kaprokal?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Pengajuan/Sarpras.html") ?>">
                                <span class="sidebar-mini"> PL </span>
                                <span class="sidebar-normal"> Pengajuan(Sarpras) </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item hidden <?= $l!=5?'hidden':'' ?> <?= $users?'active':'' ?>" >
                <a class="nav-link" data-toggle="collapse" href="#user">
                    <i class="material-icons">people</i>
                    <p> User
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?= $users?'show':'' ?>" id="user">
                    <ul class="nav">
                        <li class="nav-item <?= $l!=5?'hidden':'' ?> <?= $user_admin?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("User/admin.html") ?>">
                                <span class="sidebar-mini"> AD </span>
                                <span class="sidebar-normal"> Admin </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $l!=5?'hidden':'' ?> <?= $user_wajib?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("User/user_wajib.html") ?>">
                                <span class="sidebar-mini"> UW </span>
                                <span class="sidebar-normal"> User Wajib </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $l!=5?'hidden':'' ?> <?= $user_jurusan?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("User/user_jurusan.html") ?>">
                                <span class="sidebar-mini"> UJ </span>
                                <span class="sidebar-normal"> User Jurusan </span>
                            </a>
                        </li>
                        <li class="nav-item <?= $pelanggan?'active':'' ?>">
                            <a class="nav-link" href="<?= base_url("Action/Pelanggan.html") ?>">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal"> Pelanggan </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             <li class="nav-item hidden <?= $l!=5?'hidden':'' ?> <?= $Setting?'active':'' ?>">
                <a class="nav-link" href="<?= base_url("Setting.html") ?>">
                    <i class="material-icons">settings</i>
                    <p> Setting </p>
                </a>
            </li>
        </ul>
    </div>
</div>