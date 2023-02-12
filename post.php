<?php

if(isset($_POST['kirim'])) {
    

    //htmlspecial agar inputan aman
    $tanggal = htmlspecialchars($_POST['tanggal'], ENT_QUOTES);
    $id_plgn = htmlspecialchars($_POST['id_plgn'], ENT_QUOTES);
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $telpon = htmlspecialchars($_POST['telpon'], ENT_QUOTES);
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);

    $simpan = mysqli_query($conn, "INSERT INTO t_gangguan (tanggal,id_plgn,nama,alamat,telpon,description)
        VALUES ('$_POST[tanggal]','$_POST[id_plgn]','$_POST[nama]' ,'$_POST[alamat]', '$_POST[telpon]', '$_POST[description]')");
    if($simpan){
        echo "<script>alert('Simpan Data Sukses!!!');
        document.location='?'</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal!!!');
        document.location='?'</script>";
    }
}