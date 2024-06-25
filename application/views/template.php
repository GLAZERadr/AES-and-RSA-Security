<?php
$current_page = basename($_SERVER['PHP_SELF']); // Mengambil nama file halaman saat ini
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pengamanan Data Lokasi</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('asset/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('asset/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- tambahan -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="icon" href="" type="image/x-icon">

    <style>
        .label {
            display: inline-block;
            width: 150px; 
            font-weight: bold;
        }
        .bg-gradient-green-sea {
        background: #5386b0;
    
        }   
        .btn-success {
            background-color: #005700; 
            border-color: #005700; 
        }
        .btn-danger {
            background-color: #7F0000; 
            border-color: #7F0000; 
        }
        
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-green-sea sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <br>
			<div class="sidebar-brand d-flex align-items-center justify-content-center mt-3">
                    <img src="<?php echo base_url('asset/img/'); ?>" width="100" height="100"></img>
                </div> 

			<br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=site_url('')?>">
                    <div class="sidebar-brand-text mx-6">Sistem Pengamanan<br>Data Lokasi</div>
            </a>
			<br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo (site_url('Home') === current_url()) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?=site_url('Home')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>
			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item <?php echo (site_url('Home/Enkripsi') === current_url() || site_url('Home/Dekripsi') === current_url()) ? 'active' : ''; ?>">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
					aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-fw fa-comments"></i>
					<span>Pengamanan</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
					data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header"></h6>
						<a class="collapse-item" href="<?=site_url('Home/Enkripsi')?>">Enkripsi</a>
						<a class="collapse-item" href="<?=site_url('Home/Dekripsi')?>">Dekripsi</a>
					</div>
				</div>
			</li>
			<li class="nav-item <?php echo (site_url('Pengujian/PengujianAvalanche') === current_url() || site_url('Pengujian/Entropy') === current_url() || site_url('Pengujian/Performa') === current_url()) ? 'active' : ''; ?>">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
					aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-fw fa-wrench"></i>
					<span>Pengujian</span>
				</a>
				<div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
					data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header"></h6>
						<a class="collapse-item" href="<?=site_url('Pengujian/PengujianAvalanche')?>">Avalanche Effect</a>
						<a class="collapse-item" href="<?=site_url('Pengujian/Entropy')?>">Entropy</a>
						<a class="collapse-item" href="<?=site_url('Pengujian/PengujianPerforma')?>">Performa Sistem</a>
					</div>
				</div>
			</li>

			



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar jam -->
                                
                    <div class="topbar-clock">
                        <span id="clock"></span>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>                

                    </ul>

                </nav>
                <!-- End of Topbar -->






