<?php
include '../koneksi.php';

$id_jadwal = $_GET['id_jadwal'];
$status = $_GET['status'];
$query = "UPDATE jadwal_periksa SET status = $status WHERE id_jadwal = $id_jadwal";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header('location:menu_jadwal_periksa.php');
} else {
    header('location:menu_jadwal_periksa.php');
}
?>