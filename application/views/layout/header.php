<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if (empty($title)) : ?>
		<title>Almal Laundry</title>
	<?php else : ?>
		<title><?= $title ?></title>
	<?php endif; ?>

	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>">

	<!-- Bootstrap -->
	<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="<?= base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="<?= base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendors/datepicker/css/datepicker.css" rel="stylesheet">
	<!-- bootstrap-datetimepicker -->
	<link href="<?= base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- jQuery custom content scroller -->
	<link href="<?= base_url(); ?>assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/toastr/toastr.min.css">

	<!-- Datatables -->
	<link href="<?= base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<!-- <link href="<?= base_url(); ?>assets/vendors/summernote-master/summernote.css" rel="stylesheet"> -->
	<link href="<?= base_url(); ?>assets/vendors/summernote/summernote-bs4.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendors/fontawesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/custom.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/dropify.min.css" rel="stylesheet">
	<!-- test -->
	<!-- <link rel="stylesheet" type="text/css" href="Https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="Https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"> -->
	<!-- test -->
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="<?= base_url('dashboard'); ?>" class="site_title"><i class="fa fa-home"></i> <span>Laundry</span></a>
					</div>
					<div class="clearfix"></div>

					<?php
					$user_id = $this->session->userdata('user_id');
					$row = $this->db->get_where('tbl_user', ['user_id' => $user_id])->row_array();
					?>
					<!-- menu profile quick info -->
					<div class="profile clearfix" style="vertical-align: middle;">
						<div class="profile_pic">
							<?php if (empty($row['user_photo'])) : ?>
								<img src="<?= base_url('assets/images/default.jpg'); ?>" alt="..." class="img-circle profile_img mCS_img_loaded" style="width: 55px; height: 55px; border-radius: 50%; border: 1px solid #bcbcbc;object-fit: cover;">
							<?php else : ?>
								<img src="<?= base_url('assets/images/' . $row['user_photo']); ?>" alt="..." class="img-circle profile_img mCS_img_loaded" style="width: 55px; height: 55px; border-radius: 50%; border: 1px solid #bcbcbc;object-fit: cover;">
							<?php endif; ?>
						</div>
						<div class="profile_info">
							<span><?= ($row['user_level'] == 1) ? 'Admin' : 'User'; ?>,</span>
							<h2><?= $row['user_fullname']; ?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Dashboard</h3>
							<ul class="nav side-menu">
								<li>
									<a href="<?= base_url('dashboard'); ?>"><i class="fa fa-tachometer"></i> Dashboard </a>
								</li>
								<li class="<?= ($this->router->fetch_class() == 'post') ? 'current-page' : ''; ?>"><a><i class="fa fa-folder"></i> Data Master </a>
									<ul class="nav child_menu">
										<li><a href="<?= base_url('kas-masuk'); ?>">Kas Masuk</a></li>
										<li><a href="<?= base_url('kas-keluar'); ?>">Kas Keluar</a></li>
									</ul>
								</li>
								<?php if ($row['user_level'] == 1) : ?>
									<!-- <li class="<?= ($this->router->fetch_class() == 'post') ? 'current-page' : ''; ?>"><a><i class="fa fa-folder-open"></i> Data Rekapitulasi </a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('rekap-penerimaan'); ?>">Rekap Penerimaan Kas</a></li>
                                            <li><a href="<?= base_url('rekap-pengeluaran'); ?>">Rekap Pengeluaran Kas</a></li>
                                        </ul>
                                    </li> -->

									<!-- Laporan -->
									<li class="<?= ($this->router->fetch_class() == 'post') ? 'current-page' : ''; ?>"><a><i class="fa fa-folder-open"></i> Laporan</a>
										<ul class="nav child_menu">
											<li><a href="<?= base_url('laporan-kas-masuk'); ?>">Rekap Kas Masuk</a></li>
											<li><a href="<?= base_url('laporan-kas-keluar'); ?>">Rekap Kas Keluar</a></li>
											<li><a href="<?= base_url('laporan-buku-besar'); ?>">Laporan Buku Besar</a></li>
										</ul>
									</li>

									<li><a><i class="fa fa-cog"></i> Pengaturan </a>
										<ul class="nav child_menu">
											<li><a href="<?= base_url('akun'); ?>">Akun </a></li>
											<li><a href="<?= base_url('user'); ?>">User</a></li>
										</ul>
									</li>
								<?php else : ?>
									<li>
										<a href="<?= base_url('akun'); ?>"><i class="fa fa-cog"></i> Pengaturan Akun</a>
									</li>
								<?php endif; ?>
								<!-- <li>
                                    <a href="<?= base_url('blank'); ?>"><i class="fa fa-folder"></i> Blank </a>
                                </li> -->
								<li>
									<a href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> Logout </a>
								</li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->

				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<?php if (!$row['user_photo']) : ?>
										<img src="<?= base_url('assets/images/default.jpg'); ?>" alt=""><?= $row['user_name']; ?>
									<?php else : ?>
										<img src="<?= base_url('assets/images/' . $row['user_photo']); ?>" alt=""><?= $row['user_name']; ?>
									<?php endif; ?>
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?= base_url('akun'); ?>">
										<span>Pengaturan Akun</span>
									</a>
									<a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>

							<!-- <li role="presentation" class="nav-item dropdown open mt-1">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green"></span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="#">
                                            <span class="image"><img src="<?= base_url(); ?>assets/images/default.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span></span>
                                                <span class="time">#</span>
                                            </span>
                                            <span class="message">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item" href="#">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>

                                </ul>
                            </li> -->
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
