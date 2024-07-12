<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	$_SESSION["id_user"]=$data["id_user"];
	$_SESSION["username"]=$data["username"];
	$_SESSION["password"]=$data["password"];
	$_SESSION["email"]=$data["email"];
	$_SESSION["id_dokter"]=$data["id_dokter"];
	$_SESSION["id_user_level"]=$data["id_user_level"];
 
	// cek jika user login sebagai admin
	if($_SESSION["id_user_level"]=$data["id_user_level"]=="1"){
 
		// buat session login dan username
		// $_SESSION['id_user'] = $cek['id_user'];
		// $_SESSION['username'] = $username;
		// $_SESSION['id_user_level'] = "1";
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");
 
	// cek jika user login sebagai dokter
	}else if($_SESSION["id_user_level"]=$data["id_user_level"]=="2"){
		// buat session login dan username
		// $_SESSION['username'] = $username;
		// $_SESSION['id_user_level'] = "2";
		// alihkan ke halaman dashboard dokter
		header("location:halaman_dokter.php");
 
	// cek jika user login sebagai pengurus
	// }else if($data['level']=="pengurus"){
	// 	// buat session login dan username
	// 	$_SESSION['username'] = $username;
	// 	$_SESSION['level'] = "pengurus";
	// 	// alihkan ke halaman dashboard pengurus
	// 	header("location:halaman_pengurus.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>