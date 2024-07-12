<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id_daftar_poli = $_POST["id_daftar_poli"];
    $tanggal = $_POST["tanggal_periksa"];
    $keluhan = $_POST["keluhan"];
    // $obat = $_POST["obat"];
    $biaya_periksa = $_POST["biaya_periksa"];
    // $stp = $_POST["status_periksa"];

    // foreach($obat as $obt){
    // $query = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, obat, biaya_periksa) VALUES ('$id_daftar_poli', '$tanggal' '$keluhan', '$obt', '$biaya_periksa')";
    // }

    // Query untuk menambahkan data obat ke dalam tabel
    $query = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, biaya_periksa) VALUES ('$id_daftar_poli', '$tanggal', '$keluhan', '$biaya_periksa')";
    // $query2 = "UPDATE daftar_poli SET status_periksa = $stp WHERE id_daftar_poli = $id_daftar_poli";
    
//     $query = "INSERT INTO tb_users (username, password, ip, email, referer,joindate) VALUES('$username','$password','$laip','$email','$referer','$joindate')";

// $query .= "INSERT INTO lastregister (username,ip,joindate) VALUES('$username','$laip','$joindate2')";

// $query = "UPDATE jadwal_periksa SET status = $status WHERE id_jadwal = $id_jadwal";

// $q = mysqli_multi_query($conn, $query);
// if ($q) {
//   echo "Success";
// }

    // if ($koneksi->query($query) === TRUE) {
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
        // header("Location: ../../index.php");
        // exit();
        echo '<script>';
        echo 'alert("Data jadwal berhasil ditambahkan!");';
        echo 'window.location.href = "../menu/menu_pasien_dokter.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>