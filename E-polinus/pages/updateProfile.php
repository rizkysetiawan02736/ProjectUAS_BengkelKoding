<?php
include("../koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id_user = $_POST["id_user"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $email = $_POST["email"];

    // Query untuk melakukan update data obat
    $query = "UPDATE user SET 
        username = '$username', 
        password = '$password', 
        email = '$email' 
        WHERE id_user = '$id_user'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, redirect kembali ke halaman index atau sesuaikan dengan kebutuhan Anda
        echo '<script>';
        echo 'alert("Data obat berhasil diubah!");';
        echo 'window.location.href = "../menu/menu_profile.php";';
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