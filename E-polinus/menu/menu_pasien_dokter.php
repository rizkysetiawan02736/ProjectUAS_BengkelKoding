
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-POLINUS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Tokenfield -->
    <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css"> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['id_user_level']==""){
		header("location:login.php?pesan=gagal");
	}
 
	?>



<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >E-POLINUS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                        
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="../halaman_dokter.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        
                        <li>
                            <a href="menu_jadwal_periksa.php"><i class="fa fa-calendar fa-fw"></i> Jadwal Periksa</a>
                        </li>

                        <li>
                            <a href="menu_pasien_dokter.php"><i class="fa fa-wheelchair fa-fw"></i>  Pasien</a>
                        </li>

                        <li>
                            <a href="menu_periksa.php"><i class="fa fa-stethoscope fa-fw"></i>  Periksa</a>
                        </li>

                        
                        
                        
                        <li>
                            <a href="menu_profile_dokter.php"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                       
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

	
<div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-wheelchair"></i> Pasien</h1>
                </div>

                

                <!-- /.col-lg-12 -->
            </div>
            <br>
               

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tr align="center" style="font-weight:bold">
                    <td width="5%">No</td>
                    <td>Hari</td>
                    <td>Nama</td>
                    <td>No RM</td>
                    <td>Keluhan</td>
                    <td width="15%">Aksi</td>
                    </tr>

                    <?php
                        include '../koneksi.php';
                        $no = 1;
                        $query = "SELECT * FROM daftar_poli INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id_jadwal INNER JOIN pasien on daftar_poli.id_pasien = pasien.id WHERE id_dokter= '$_SESSION[id_dokter]'";
                        $result = mysqli_query($koneksi, $query);

                        while ($row = mysqli_fetch_array($result)) :

                            ?>


                                    <tr align="center">
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['hari'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['no_rm'] ?></td>
                                    <td><?= $row['keluhan'] ?></td>
                                    
                                    <td>
                                        <div class="btn-group" role="group">
                                        <a title="Diagnosa" href="menu_diagnosa.php?id_daftar_poli=<?php echo $row['id_daftar_poli'];?>" type="button" class="btn btn-sm btn-success" ><i class="fa fa-plus-square"></i></a>
                                        <!-- untuksertif -->
                                        <!-- <?php
                                        if($row['status_periksa'] == 0){
                                            echo '<a class="btn btn-sm btn-success" href="menu_diagnosa.php?id_daftar_poli=' . $row['id_daftar_poli'] . '&status_periksa=1">Belum Diperiksa</a>';
                                        } else{
                                            echo 'Sudah Diperiksa';
                                        }
                                        ?> -->
                                    </div>
                                    </td>
                                    </tr>

                                  <!-- Awal Modal Ubah-->
                                  <div class="modal fade" id="modalEdit<?=$no?>" role="dialog">
                                  <div class="modal-dialog">
        
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                      </div>
        
                                            <div class="modal-body">
                                            <!-- Form ubah data obat disini -->
                                            <form action="../pages/updateJadwal.php" method="post">
                                            <input type="hidden" name="id_jadwal" value="<?= $row['id_jadwal']; ?>">
                                                
                                            
                                                <div class="form-group">
                                                    <label for="nama_obat">Hari</label>
                                                    <input type="text" class="form-control" id="hari" name="hari" value="<?= $row['hari']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kemasan">Jam Mulai</label>
                                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?= $row['jam_mulai']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Jam Selesai</label>
                                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?= $row['jam_selesai']; ?>" required>
                                                </div>
                                                
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                            </form>
                                            </div>
        
                                      
                                    </div>
        
                                  </div>
                                  </div>
                                  <!-- Akhir Modal Ubah-->

                                  <!-- Awal Modal Hapus-->
                                  <div class="modal fade" id="modalHapus<?=$no?>" role="dialog">
                                  <div class="modal-dialog">
        
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                      </div>
        
                                            <div class="modal-body">
                                            <!-- Form ubah data obat disini -->
                                            <form action="../pages/hapusObat.php" method="post">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            
                                            <h5 class="text-center"> Apakah anda yakin ingin menghapus data ini? </h5>
                                            <br>
                                            <h5 class="text-center " style="color:red;"><?= $row['nama_obat'] ?></h5>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="bHapus">Hapus</button>
                                            </div>  
                                            
                                            </form>
                                            </div>

                                          
        
                                      
                                    </div>
        
                                  </div>
                                  </div>
                                  <!-- Akhir Modal Hapus-->





                                    <?php endwhile; ?>

                                



                               
                        
                    






                                
                    </table>
                    
                    
                    

                    

                </div>
            </div>
</div>  
        <!-- /#page-wrapper -->

    



</div>
<!-- /#wrapper -->



<!-- <script>
$('#tokenfield').tokenfield({
  autocomplete: {
    source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
    delay: 100
  },
  showAutocompleteOnFocus: true
})
</script> -->

  <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Tokenfield JS -->
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script> -->
    
 

</body>
</html>