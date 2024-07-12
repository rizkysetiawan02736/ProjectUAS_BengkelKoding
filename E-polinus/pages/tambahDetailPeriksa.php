<?php
include '../koneksi.php';
if(isset($_POST['save_resep'])){
    $id_periksa = $_POST["id_periksa"];
    $obat = $_POST["obat"];


    foreach($obat as $obt){
    $query = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES ('$id_periksa', '$obt')";
    $query_run = mysqli_query($koneksi, $query);
    }

    if($query_run){
        echo '<script>';
        echo 'alert("Data resep obat berhasil ditambahkan!");';
        echo 'window.location.href = "../menu/menu_periksa.php";';
        echo '</script>';
        exit();

    } else {
                // Jika terjadi kesalahan, tampilkan pesan error
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }

}
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    


    // $i = 0;
    // foreach ($_POST as $val) {
    // $id_periksa = $_POST['id_periksa'][$i];
    // $obat = $_POST['obat'][$i];

//     $query = "INSERT INTO detail_periksa ( id_obat) VALUES ( '$obat')";
//     $i++;
//   } 


   

    

    

    // if ($koneksi->query($query) === TRUE) {
    // Eksekusi query
//     if (mysqli_query($koneksi, $query)) {
//         // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
//         // header("Location: ../../index.php");
//         // exit();
//         echo '<script>';
//         echo 'alert("Data resep obat berhasil ditambahkan!");';
//         echo 'window.location.href = "../menu/menu_periksa.php";';
//         echo '</script>';
//         exit();
//     } else {
//         // Jika terjadi kesalahan, tampilkan pesan error
//         echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
//     }
// }

// // Tutup koneksi
// mysqli_close($koneksi);
?>