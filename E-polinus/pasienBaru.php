<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>E-POLINUS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	</head>

	<body>
                <?php
                include 'koneksi.php';

                //fungsi penomoran otomatis
                //RM-001-01012024
                $today = date('dmy');
                $queryNo = mysqli_query($koneksi, "SELECT max(no_rm) as maxno FROM pasien WHERE right(no_rm, 6) = '$today'");
                $dataNo = mysqli_fetch_assoc($queryNo);
                $noRM = $dataNo['maxno'];

                $noUrut = (int) substr($noRM, 3, 3);

                $noUrut++;

                $noRM = 'RM-' . sprintf("%03s", $noUrut) . '-' . date('dmy');

                mysqli_close($koneksi);
                ?>

                        

		<div class="wrapper">
			<div class="inner">
				<img src="images/n.png" alt="" class="image-1">
				<form action="pages/tambahPasienBaru.php" method="post">
					<!-- Logo -->
                    <div class="form-holder">
                      <a href="index.php" class="app-brand-link gap-2">
                      <img class="center" src="assets/img/icons/logo.png" alt="" width="100" height="100" />
                      </a>
                    </div>

					<h2 style="font-weight: bold; color:#000000; margin-bottom: 15px;" align="center">Mendaftar Pasien</h2>

					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-map-marker"></span>
						<input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-license"></span>
						<input type="text" class="form-control" placeholder="Nomor KTP" name="no_ktp" id="no_ktp" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-smartphone"></span>
						<input type="text" class="form-control" placeholder="Nomor HP" name="no_hp" id="no_hp" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-wheelchair"></span>
						<input type="text" class="form-control" placeholder="Nomor RM" name="no_rm" id="no_rm" value="<?= $noRM ?>" readonly>
					</div>
					<button type="submit">
						<span>Daftar</span>
					</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>