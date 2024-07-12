<?php
include 'koneksi.php';
$no_rm = $_GET['no_rm'];
$query = mysqli_query($koneksi, "select * from pasien where no_rm='$no_rm'");
$p = mysqli_fetch_array($query);
$data = array(
            'id'      =>  $p['id'],
            'nama'      =>  $p['nama'],
            );
 echo json_encode($data);
?>