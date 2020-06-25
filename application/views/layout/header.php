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
