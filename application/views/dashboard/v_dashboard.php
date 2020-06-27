<!-- page content -->
<!-- <div class="right_col" role="main" style="min-height: 100vh;"> -->
<div class="right_col" role="main" style="min-height: 100vh!important;">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<!-- <h3>Dashboard </h3> -->
			</div>

			<!-- <div class="title_right">
				<div class="col-md-5 col-sm-5   form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><i class="fa fa-search mr-1"> </i> </button>
						</span>
					</div>
				</div>
			</div> -->
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary pt-4 pb-4 btn_flat">
					<h2 class="text-center text-dark">
						APLIKASI KAS MASUK DAN KAS KELUAR PADA ALMAL LAUNDRY PONTIANAK
					</h2>
				</div>

			</div>
		</div>

		<div class="row">

			<?php if ($this->session->userdata('user_level') == 1) : ?>
				<div class="col-md-12">
					<div class="x_content">
						<div class="row">
							<div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
								<div class="tile-stats">
									<!-- <div class="icon"><i class="fa fa-caret-square-o-down"></i> -->
									<div class="icon"><i class="fa fa-cloud-download"></i>
									</div>
									<div class="count"><?= $kasmasuk->num_rows(); ?></div>

									<h4>Total Kas Masuk</h4>
								</div>
							</div>
							<div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
								<div class="tile-stats">
									<!-- <div class="icon"><i class="fa fa-caret-square-o-up"></i> -->
									<div class="icon"><i class="fa fa-cloud-upload"></i>
									</div>
									<div class="count"><?= $kaskeluar->num_rows(); ?></div>

									<h4>Total Kas Keluar</h4>
								</div>
							</div>
							<div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-download"></i>
									</div>
									<?php
									foreach ($debitMasuk->row_array() as $r) {
										$dM[] = $r['total'];
									}
									$total = array_sum($dM);
									?>

									<div class="count"><?= rupiah($total); ?></div>

									<h4>Debit Pemasukan Bulan <?= date('M'); ?></h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-upload"></i>
									</div>
									<div class="count"><?= rupiah(1000); ?></div>

									<h4>Debit Pengeluaran Bulan <?= date('M'); ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php else : ?>
				<div class="col-md-12">
					<div class="x_content">
						<div class="row">
							<div class="animated flipInY col-lg-6 col-md-6 col-sm-6">
								<div class="tile-stats">
									<!-- <div class="icon"><i class="fa fa-caret-square-o-down"></i> -->
									<div class="icon"><i class="fa fa-cloud-download"></i>
									</div>
									<div class="count"><?= $kasmasuk->num_rows(); ?></div>

									<h4>Total Kas Masuk</h4>
								</div>
							</div>
							<div class="animated flipInY col-lg-6 col-md-6 col-sm-6">
								<div class="tile-stats">
									<!-- <div class="icon"><i class="fa fa-caret-square-o-up"></i> -->
									<div class="icon"><i class="fa fa-cloud-upload"></i>
									</div>
									<div class="count"><?= $kaskeluar->num_rows(); ?></div>

									<h4>Total Kas Keluar</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="col-md-12 col-sm-12 ">
				<!-- <div class="x_panel">
					<div class="col-md-12">
						<div class="x_title">
							<h2>Dashboard </h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-sm-12">
									<div class="card-box table-responsive">
										<p class="text-muted font-13 m-b-30">
											Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, voluptates, expedita, sed architecto quisquam ea ut molestias illum itaque maiores placeat dolor odio recusandae aliquid optio aut dolorum. Sapiente, laboriosam?
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-lg-3">
						<div class="card">
							<div class="card-body">
								<p class="font-weight-bold"><i class="fa fa-info-circle"></i> Order</p>
								<form action="<?= base_url('transaksi'); ?>" method="post">
									<input type="hidden" name="status" value="1">
									<table class="table">
										<tbody>
											<tr>
												<td>Hari ini</td>
												<td align="right"><b><?= $orderToday->num_rows(); ?></b></td>
											</tr>
											<tr>
												<td>Semua</td>
												<td align="right"><b><?= $orderAll->num_rows(); ?></b></td>
											</tr>
										</tbody>
									</table>
									<button type="submit" name="order" class="btn btn-success float-right">Detail <i class="fa fa-arrow-right"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="card-body">
								<p class="font-weight-bold"><i class="fa fa-info-circle"></i> Dikerjakan</p>
								<form action="<?= base_url('transaksi'); ?>" method="post">
									<input type="hidden" name="status" value="2">
									<table class="table">
										<tbody>
											<tr>
												<td>Hari ini</td>
												<td align="right"><b><?= $dikerjakanToday->num_rows(); ?></b></td>
											</tr>
											<tr>
												<td>Semua</td>
												<td align="right"><b><?= $dikerjakanAll->num_rows(); ?></b></td>
											</tr>
										</tbody>
									</table>
									<button type="submit" name="order" class="btn btn-success float-right">Detail <i class="fa fa-arrow-right"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="card-body">
								<p class="font-weight-bold"><i class="fa fa-info-circle"></i> Selesai</p>
								<form action="<?= base_url('transaksi'); ?>" method="post">
									<input type="hidden" name="status" value="3">
									<table class="table">
										<tbody>
											<tr>
												<td>Hari ini</td>
												<td align="right"><b><?= $selesaiToday->num_rows(); ?></b></td>
											</tr>
											<tr>
												<td>Semua</td>
												<td align="right"><b><?= $selesaiAll->num_rows(); ?></b></td>
											</tr>
										</tbody>
									</table>
									<button type="submit" name="order" class="btn btn-success float-right">Detail <i class="fa fa-arrow-right"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="card-body">
								<p class="font-weight-bold"><i class="fa fa-info-circle"></i> Diambil</p>
								<form action="<?= base_url('transaksi'); ?>" method="post">
									<input type="hidden" name="status" value="4">
									<table class="table">
										<tbody>
											<tr>
												<td>Hari ini</td>
												<td align="right"><b><?= $diambilToday->num_rows(); ?></b></td>
											</tr>
											<tr>
												<td>Semua</td>
												<td align="right"><b><?= $diambilAll->num_rows(); ?></b></td>
											</tr>
										</tbody>
									</table>
									<button type="submit" name="order" class="btn btn-success float-right">Detail <i class="fa fa-arrow-right"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- col-md-12 -->
		</div>
	</div>
</div>
<!-- /page content -->
