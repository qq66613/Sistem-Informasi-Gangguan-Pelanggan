<?php


include "koneksi.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Export Excel Keluahan Pelanggan.xls");
header("Pragma: no-cahce");
header("Expires:0");




?>

<table border="1">
    <thead>
        <tr>
            <th colspan="7">Rekapitulasi Keluhan Pelanggan</th>
        </tr>
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
            $ex1 = $_POST['ekspor'];
            $ex2 = $_POST['ekspor2'];

            $tampil = mysqli_query($conn, "SELECT * FROM t_gangguan where tanggal BETWEEN
            '$ex1' and '$ex2' order by tanggal asc");
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