<?php include "header.php";?>


<!---Awal Row--->
<div class="row">
    <!---Awal col--->
    <div class="col-md-12 mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 ">
                <h6 class="m-0 font-weight-bold text-center text-primary ">Rekapitulasi Laporan Pelanggan</h6>
            </div>
            <!---start the card datatable-->
            <div class="card-body">
                <form method="post" action="" class="text-center">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input class="form-control" type="date"
                                    value="<?=isset($_POST['tanggal1']) ? $_POST['tanggal1'] :date('Y-m-d') ?>"
                                    name="tanggal1" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input class="form-control" type="date"
                                    value="<?=isset($_POST['tanggal2']) ? $_POST['tanggal2'] :date('Y-m-d') ?>"
                                    name="tanggal2" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <button class="btn btn-primary form-control" name="tamrekap">

                                <i class="fa fa-search"></i>
                                Rekapitulasi</button>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <a href="admin.php" class="btn btn-danger form-control"><i class="fa fa-backward">
                                    </i> Kembali </a>

                            </div>
                        </div>
                    </div>
                </form>

                <!--Function Tampilkan--->



                <?php
                if(isset($_POST['tamrekap'])) :
                ?>

                <!--Strat Table--->
                <div class="table-responsive ">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
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
                            $tgl1 = $_POST['tanggal1'];
                            $tgl2 = $_POST['tanggal2'];

                            $tampil = mysqli_query($conn, "SELECT * FROM t_gangguan where tanggal BETWEEN
                            '$tgl1' and '$tgl2' order by id desc");
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
                    <center class="mt-4">
                        <form method="post" action="exportexcel.php">
                            <div class="col-md-3">
                                <input name="ekspor" type="hidden" value="<?=@$_POST['tanggal1']?>">
                                <input name="ekspor2" type="hidden" value="<?=@$_POST['tanggal2']?>">
                                <button class="btn btn-success form-control" name="eksporitem">
                                    <i class="fa fa-file-excel"></i> Export Data To Excel
                                </button>
                            </div>
                        </form>
                    </center>
                    <!----@ UNTUK menahan warning ketika kososng----->
                </div>
                <!--End Table--->
                <?php endif; ?>

                <!--end Function Tampilkan--->
            </div>
        </div>
    </div>
    <!---Akhir col--->
</div>
<!--Ending Row-->






















<?php include "footer.php";?>