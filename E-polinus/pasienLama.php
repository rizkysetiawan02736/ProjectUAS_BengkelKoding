<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>E-POLINUS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/style2.css">


        <style>
        
        
        /* .text-shadow {
         color: black;
         text-shadow: 2px 2px 4px #000000;
        } */
        </style>  
	</head>

	<body>

    

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="images/o.png"  alt="" style=" margin-bottom: -495px;" >
				</div>

                <?php
                include 'koneksi.php';

                //fungsi penomoran otomatis
                //A-001-01012024
                $id_jadwal = $_GET['id_jadwal'];
                $today = date('dmy');
                $queryNo = mysqli_query($koneksi, "SELECT max(no_antrian) as maxno FROM daftar_poli WHERE right(no_antrian, 6) = '$today'");
                $dataNo = mysqli_fetch_assoc($queryNo);
                $noA= $dataNo['maxno'];

                $noUrut = (int) substr($noA, 3, 3);

                $noUrut++;

                $noA = 'A-' . sprintf("%03s", $noUrut) . '-' . date('dmy');

                mysqli_close($koneksi);
                ?>


                <!-- <?php
                include 'koneksi.php';
                $id_jadwal = $_GET['id_jadwal'];
                $no = 1;
                $query = "SELECT * FROM jadwal_periksa WHERE id_jadwal='$id_jadwal'";
                $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_array($result)) :
                ?> -->



				<form action="pages/tambahPasienLama.php" method="post">
					<!-- Logo -->
                    <div class="form-holder" style=" margin-bottom: 10px;">
                      <a href="index.php" class="app-brand-link gap-2">
                      <img class="center" src="assets/img/icons/logo.png" alt="" width="100" height="100" />
                      </a>
                    </div>

                    <div class="form-holder">
                    <h3 style="font-weight: bold; margin-top: 20px; margin-left: -290px;" >Mendaftar Poli</h3>
                    </div>
                    


                    <input type="hidden" id="id_jadwal" name="id_jadwal" value="<?php echo $row['id_jadwal'] ?>">
                   

                    <div class="form-holder">
                    <label for="no_antrian">Nomor Antrian</label>
                    <br>
                    <input type="text" id="no_antrian" name="no_antrian" style=" width:300px; " value="<?= $noA ?>" readonly>
                    </div>
                    <br>

                    <div class="form-holder">
                    <label for="no_rm">Nomor RM</label>
                    <br>
                    <input type="text" style=" width:300px; " onkeyup="isi_otomatis()" id="no_rm" name="no_rm">
                    </div>
                    <br>
                    <table>
                    <tr><td><input type="hidden" id="id" name="id" ></td></tr>
                    <tr><td><input type="hidden" id="nama" name="nama"></td></tr>
					<table>
                    <!-- <div class="form-row">
                    <label for="nama_obat">Nomor RM</label>
						<input type="text" class="form-control" id="no_rm" name="no_rm">
					</div>
					<div class="form-row">
						<input type="text" class="form-control" placeholder="Phone">
						<div class="form-holder">
							<select name="" id="" class="form-control">
								<option value="" disabled selected>Choose Your Class</option>
								<option value="class 01">Class 01</option>
								<option value="class 02">Class 02</option>
								<option value="class 03">Class 03</option>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
					</div> -->
                    <div class="form-holder">
                     <label for="keluhan">Keluhan</label>
                     <br>
					<textarea class="input" placeholder="Message..." name="keluhan" id="keluhan" class="form-control" style="height: 130px; width:300px; "></textarea>
                    </div>
                    
					<button style=" margin-left: 0px; width:300px;">Daftar
						<i class="zmdi zmdi-long-arrow-right"></i>
					</button>
				</form>
                <!-- <?php endwhile; ?> -->

                <script src="js/jquery-1.12.4.min.js"></script>   
                <script type="text/javascript">
                function isi_otomatis(){
                    var no_rm = $("#no_rm").val();
                    $.ajax({
                        url : 'proses-ajax.php',
                        data :"no_rm="+no_rm ,
                    success:function (data) {
                        var json = data,
                        obj = JSON.parse(json);
                        $('#id').val(obj.id);
                        $('#nama').val(obj.nama);
                        
                    }
                    });
                    }
                </script>
				
			</div>
		</div>

		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>