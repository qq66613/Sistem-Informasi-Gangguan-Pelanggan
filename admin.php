<?php include "header.php" ;?>
<?php include "post.php" ;?>



?>

<!--Class Head --->
<div class="head text-md-center">
    <img src="assets/img/1.svg" width="230" class="image mt-2">
    <h2 class="text-white mt-4">Sistem Informasi Gangguan Regional 1<br>-Wilayah Jakarta Barat-</h2>
</div>
<!--Classs Head End line--->

<!---Awal Row -->
<div class="row mt-2">
    <!---column with 7 item -->
    <div class="col-lg-7 mb-3">
        <div class="card shadow bg-gradient-light">
            <!---start card-body-->
            <div class="card-body">

                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Input Keluahan Costumer</h1>
                </div>
                <form class="user" method="post" action="">
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" placeholder="Tanggal Laporan"
                            name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="ID Pelanggan"
                            name="id_plgn" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Nama Pelanggan"
                            name="nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Alamat Gangguan"
                            name="alamat" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Nomor Telepon"
                            name="telpon" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control form-control-user"
                            placeholder="Ketik Keluhan Anda" required></textarea>
                    </div>


                    <button type="submit" name="kirim" class="btn btn-primary btn-user btn-block">Kirim keluahan
                        layanan</button>



                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="#">Copyright Telcom Department |2021-<?=date('Y')?></a>
                </div>

            </div>
            <!---end Card-body -->
        </div>
    </div>
    <!--- end of column with 7 item -->
    <!--- start of column with 5 item -->
    <div class="col-lg-5 mb-3">
        <div class="card shadow ">
            <!---strat card-body-->
            <div class="card-body">

                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                </div>
                <!--- start function statistik--->
                <?php
                //untuk deklrasi tanggal
                //tanggal sekarang
                $tgl_sekarang = date('Y-m-d');
                //untuk mendapatkan tanggal kemarin
                $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
                //untuk mendapatkan 6 hari sebelum tanggal sekarang
                $seminggu = date('Y-m-d h:i:s', strtotime('-1 week + 1 day', strtotime($tgl_sekarang)));

                $duaminggu = date('Y-m-d h:i:s', strtotime('-2 week + 1 day', strtotime($tgl_sekarang)));

                $month = date('m');
                $sekarang = date('Y-m-d h:i:s');
                //method query untuk menampilkan data
                $tgl_sekarang = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM t_gangguan where tanggal like'%$tgl_sekarang%'" 
                ));
                $kemarin = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM t_gangguan where tanggal like'%$kemarin%'" 
                ));
                $seminggu = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM t_gangguan where tanggal BETWEEN '$seminggu' and '$sekarang'"
                ));
                $duaminggu = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM t_gangguan where tanggal BETWEEN '$duaminggu' and '$sekarang'"
                ));
                $sebulan = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM t_gangguan where month(tanggal) ='$month'"
                ));
                $keseluruhan = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM t_gangguan "
                ));
                ?>
                <!--- end function statistik--->
                <table class="table table-bordered">
                    <tr>
                        <td>Hari ini</td>
                        <td> <?=$tgl_sekarang[0] ?></td>
                    </tr>
                    <tr>
                        <td>Kemarin</td>
                        <td> <?=$kemarin[0] ?></td>
                    </tr>
                    <tr>
                        <td>Seminggu</td>
                        <td> <?=$seminggu[0] ?> </td>
                    </tr>
                    <tr>
                        <td>2 minggu</td>
                        <td> <?=$duaminggu[0] ?> </td>
                    </tr>
                    <tr>
                        <td>Bulan ini</td>
                        <td> <?=$sebulan[0] ?></td>
                    </tr>
                    <tr>
                        <td>Keseluruhan</td>
                        <td> <?=$keseluruhan[0] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--- end of column with 5 item -->
</div>
<!---Akhir Row -->
<!---start datatable-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data laporan hari ini:[<?= date('d-m-Y');?>]</h6>
    </div>
    <!---start the card datatable-->
    <div class="card-body">
        <!---Strat Function Button-->
        <a href="rekap.php" class="btn btn-primary mb-3"><i class="fa fa-table"></i> Rekapitulasi Laporan </a>
        <a href="logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out-alt"></i> logout
        </a>
        <!--end Function Button--->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat Gangguan</th>
                        <th>Nomor Telpon</th>
                        <th>Keluhan</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $tampil = mysqli_query($conn, "SELECT * FROM t_gangguan order by id desc");
                    $no = 1;
                    while ($data = mysqli_fetch_array($tampil)) {


                        ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['tanggal'] ?></td>
                        <td><?= $data['id_plgn'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['telpon'] ?></td>
                        <td><?= $data['description'] ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <!---end the card datatable-->
</div>
<!---end datatable-->

<?php include "footer.php" ;?>