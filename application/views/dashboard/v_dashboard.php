<!-- page content -->
<!-- <div class="right_col" role="main" style="min-height: 100vh;"> -->
<div class="right_col" role="main" style="min-height: 100vh!important;">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<!-- <h3>Dashboard </h3> -->
				<?php
				$user_id = $this->session->userdata('user_id');
				$row = $this->db->get_where('tbl_user', ['user_id' => $user_id])->row_array();
				?>
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

			<?php if ($row['user_level'] == 1) : ?>
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
									// select 'id terakhir' di tbl rekap
									$cekRekap = $this->rekap_model->cek_rekapkeluar()->row_array();
									$rekapID = $cekRekap['rekap_id'];
									// ambil data berdasarkan 'id terakhir'
									$rekap = $this->db->get_where('tbl_kas_rekap', ['rekap_id' => $rekapID])->row_array();
									// $rekap['rekap_total'];
									$debit = $rekap['rekap_debit'];
									?>
									<div class="count"><?= rupiah($debit); ?></div>

									<h4>Debit Penerimaan Bulan <?= date('M'); ?></h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-upload"></i>
									</div>
									<?php
									// select 'id terakhir' di tbl rekap
									$cekRekap = $this->rekap_model->cek_rekapmasuk()->row_array();
									$rekapID = $cekRekap['rekap_id'];
									// ambil data berdasarkan 'id terakhir'
									$rekap = $this->db->get_where('tbl_kas_rekap', ['rekap_id' => $rekapID])->row_array();
									// $rekap['rekap_total'];
									$debit = $rekap['rekap_debit'];
									?>
									<div class="count"><?= rupiah($debit); ?></div>

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

			<!-- <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
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
                </div>
            </div> -->
			<!-- col-md-12 -->
		</div>
	</div>
</div>
<!-- /page content -->

<?php echo $footer; ?>
