<?php				
	include '../koneksi.php'; //menghubungkan ke file koneksi untuk ke database
	
	//uji tombol hapus di klik
	if(isset($_POST['bHapus'])){
		//persiapan hapus data
		$hapus = mysqli_query($koneksi, "DELETE FROM obat WHERE id = '$_POST[id]' ");
	
	//jika hapus sukses
	if($hapus){
		echo "<script>
		alert('Hapus data Sukses!');
		document.location='../menu/menu_obat.php';
		</script>";
	} else {
		echo "<script>
		alert('Hapus data Gagal!');
		document.location='../menu/menu_obat.php';
		</script>";
	}	
	} 
?>