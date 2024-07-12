<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
   
    $id= $_POST["id"];
    $id_jadwal = $_POST["id_jadwal"];
    $keluhan = $_POST["keluhan"];
    $no_antrian = $_POST["no_antrian"];

    // Query untuk menambahkan data obat ke dalam tabel
    $query = "INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian) VALUES ('$id', '$id_jadwal', '$keluhan', '$no_antrian')";
    

    // if ($koneksi->query($query) === TRUE) {
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
        // header("Location: ../../index.php");
        // exit();
        echo '<script>';
        echo 'alert("Berhasil mendaftar pasien!");';
        echo 'window.location.href = "../PilihDokter.php";';
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