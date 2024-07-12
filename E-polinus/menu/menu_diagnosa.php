
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

    <!-- Css Files-->
  <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
     -->
   <!-- css untuk select2 -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jika menggunakan bootstrap4 gunakan css ini  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    
   
  
    

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
                    <h1 class="page-header"><i class="fa fa-plus-square"></i> Diagnosa</h1>
                </div>

                <?php
                include '../koneksi.php';
                $id_daftar_poli = $_GET['id_daftar_poli'];
                // $status = $_GET['status_periksa'];
                $no = 1;
                $query = "SELECT * FROM daftar_poli WHERE id_daftar_poli='$id_daftar_poli'";
                $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_array($result)) :
                ?>

                <form action="../pages/tambahPeriksa.php" method="post">   

                <div class="card-body">
			    <div class="row">

                    <!-- <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>"> -->
                    
                    <!-- <input style=" width:300px; " autocomplete="off" type="hidden" name="status_periksa" value="<?php echo $status ?>" required class="form-control"/> -->
                    

			    	<div class="form-holder" style="margin-left: 30px;">
			    		<label class="font-weight-bold">ID Daftar Poli</label>
			    		<input style=" width:300px; " autocomplete="off" type="text" name="id_daftar_poli" value="<?php echo $row['id_daftar_poli'] ?>" required class="form-control" readonly/>
			    	</div>
                    <br>

                    

			    	<div class="form-holder" style="margin-left: 30px;">
			    		<label class="font-weight-bold">Tanggal Periksa</label>
			    		<input style=" width:300px; " autocomplete="off" type="date" name="tanggal_periksa" required class="form-control" />
			    	</div>
                    <br>

                    

                    


                    <div class="form-holder" style="margin-left: 30px;">
                     <label for="keluhan">Diagnosa</label>
                     <br>
					<textarea class="input" placeholder="Message..." name="keluhan" id="keluhan" class="form-control" style="height: 130px; width:300px; "></textarea>
                    </div>
                    <br>


                    <!-- <div class="form-holder" style="margin-left: 30px;">
			    		<label class="font-weight-bold">Obat</label>
			    		<select id="obat" multiple="multiple" name="obat[]" class="form-control" style=" width:300px; ">

                        </select>
			    	</div>
                    <br> -->

                    <div class="form-holder" style="margin-left: 30px;">
			    		<label class="font-weight-bold">Biaya Periksa</label>
			    		<input style=" width:300px; " autocomplete="off" type="text" name="biaya_periksa" value="150000" placeholder="150000" required class="form-control" readonly/>
			    	</div>
                    <br>
    
			    	<!-- <div class="form-group col-md-6">
			    		<label class="font-weight-bold">Password</label>
			    		<input autocomplete="off" type="text" name="password" value="<?php echo $_SESSION['password']; ?>" required class="form-control"/>
			    	</div>
    
			    	<div class="form-group col-md-6">
			    		<label class="font-weight-bold">Email</label>
			    		<input autocomplete="off" type="text" name="email" value="<?php echo $_SESSION['email']; ?>" required class="form-control"/>
			    	</div> -->
			    </div>
		    </div>
            <br>

		<div class="card-footer text-left" style="margin-left: 15px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            
        </div>
        




                
                </form>

                

                <?php endwhile; ?>
                 
                <!-- <script>
                $(document).ready(function(){

                    $('#tokenfield').tokenfield({
                      autocomplete: {
                        source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
                        delay: 100
                      },
                      showAutocompleteOnFocus: true
                    })

                })
                    
                    
                </script> -->
                
                

                <!-- /.col-lg-12 -->
            </div>
            <br>
               

            
</div>  
        <!-- /#page-wrapper -->

    



</div>
<!-- /#wrapper -->

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

    <!-- wajib jquery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- js untuk bootstrap4  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <!-- js untuk select2  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#obat').select2({
                theme: 'bootstrap4',
                allowClear: true,
                placeholder: 'cari nama obat',
                ajax: {
                    dataType: 'json',
                    url: 'data.php',
                    delay: 800,
                    data: function (params) {
                        return {
                            search: params.term
                        }
                    },
                    processResults: function (data, page) {
                        return {
                            results: data
                        };
                    },
                }
            })
        });
    </script>

    
    

    
 

</body>
</html>