<!-- page content -->
<!-- <div class="right_col" role="main" style="min-height: 100vh;"> -->
<div class="right_col" role="main" style="min-height: 100vh!important;">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-6">
				<h3 class="m-0" id="titleprint">Laporan Kas Masuk</h3>
			</div>
		</div>

		<div class="row mt-1">

			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_content">
						<div class="row">
							<div class="col-sm-6">
								<!--  -->
								<div class="card">
									<div class="card-body">
										<p class="font-weight-bold">Laporan Kas Masuk Per-Bulan</p>
										<hr>
										<form action="<?= base_url('laporan_kasmasuk/cetak_per_bulan'); ?>" target="_blank" method="post">
											<div class="form-group">
												<div class="row">
													<div class="col-lg-6">
														<label for="bulan">Pilih Bulan</label>
														<select name="bulan" id="bulan" class="form-control" required>
															<option value="">--- Pilih Bulan ---</option>
															<option value="01">Januari</option>
															<option value="02">Februari</option>
															<option value="03">Maret</option>
															<option value="04">April</option>
															<option value="05">Mei</option>
															<option value="06">Juni</option>
															<option value="07">Juli</option>
															<option value="08">Agustus</option>
															<option value="09">September</option>
															<option value="10">Oktober</option>
															<option value="11">November</option>
															<option value="12">Desember</option>
														</select>
													</div>
													<div class="col-lg-6">
														<label for="tahun">Pilih Tahun</label>
														<select name="tahun" id="tahun" class="form-control" required>
															<option value="">--- Pilih Tahun ---</option>
															<?php $tahun = date("Y"); ?>
															<?php for ($t = $tahun; $t >= 2015; $t--) : ?>
																<option value="<?= $t; ?>" <?= ($tahun == $t) ? "selected" : ""; ?>><?= $t; ?></option>
															<?php endfor; ?>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group d-flex mt-5">
												<button type="submit" class="btn btn-sm btn-success mr-2 pl-4 pr-4">
													<i class="fa fa-print"></i> CETAK LAPORAN
												</button>
											</div>
										</form>
									</div>
								</div>
								<!--  -->
							</div>

							<!-- Periode -->
							<div class="col-sm-6">
								<!--  -->
								<div class="card">
									<div class="card-body">
										<p class="font-weight-bold">Laporan Kas Masuk Per-Periode</p>
										<hr>
										<form action="<?= base_url('laporan_kasmasuk/cetak_per_periode'); ?>" target="_blank" method="post">
											<div class="form-group">
												<div class="row">
													<div class="col-lg-6">
														<label for="bulan">Tanggal Awal</label>
														<input type="date" name="tgl_awal" class="form-control">
													</div>
													<div class="col-lg-6">
														<label for="tahun">Tanggal Akhir</label>
														<input type="date" name="tgl_akhir" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group d-flex mt-5">
												<button type="submit" class="btn btn-sm btn-success mr-2 pl-4 pr-4">
													<i class="fa fa-print"></i> CETAK LAPORAN
												</button>
											</div>
										</form>
									</div>
								</div>
								<!--  -->
							</div>
							<!-- /.Periode -->
						</div>
					</div>
				</div>
			</div>
			<!-- col-md-12 -->
		</div>
	</div>
</div>
<!-- /page content -->
