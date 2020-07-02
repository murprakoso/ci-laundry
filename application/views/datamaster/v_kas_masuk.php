<!-- page content -->
<!-- <div class="right_col" role="main" style="min-height: 100vh;"> -->
<div class="right_col" role="main" style="min-height: 100vh!important;">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-6">
				<h3 class="m-0" id="titleprint">Kas Masuk</h3>
			</div>
			<div class="col-md-6 m-0">
				<div class="kanan mt-2">
					<div class="btn-group">
						<div id="deleteall">
							<button type="button" form="form-delete" id="btn-delete" class="btn btn-sm btn-danger btn_flat text-white">
								<i class="fa fa-trash"></i>
							</button>
						</div>
						<!-- <button type=" button" data-toggle="modal" data-target="#formModal" class="btn btn_flat btn-success btn-sm tombolTambahData ml-2"><i class="fa fa-plus"></i> Tambah</button> -->
					</div>
					<!-- Tombol Print & Export -->
					<!-- <a id="tt"></a> -->
				</div>
			</div>
		</div>

		<div class="row mt-1">

			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<table id="datatable" class="table table-hover table-bordered" style="width:100%">
										<form action="<?= base_url('kas_masuk/deletes'); ?>" method="POST" id="form-delete"></form>
										<thead>
											<tr>
												<th class="tidakprint">
													<input type="checkbox" class="checkmarkall" id="check-all">
												</th>
												<th>No.</th>
												<th>Tanggal</th>
												<th>Tipe</th>
												<th>Berat</th>
												<th>Nama Pelanggan</th>
												<th>No HP</th>
												<th>Keterangan</th>
												<th>Petugas</th>
												<th>Harga</th>
												<th>Total</th>
												<th>
													<i class="fa fa-cog tidakprint"></i>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											foreach ($kasmasuk->result() as $row) :
											?>
												<tr>
													<td style="width: 5px;">
														<input type="checkbox" class="check-item" form="form-delete" name="kasmasuk_id[]" value="<?= $row->kasmasuk_id; ?>">
													</td>
													<td style="width: 5px;"><?= ++$no; ?></td>
													<td><?= date('d-M-Y', strtotime($row->tanggal)); ?></td>
													<td><?= ($row->tipe == 1 ? 'Satuan' : 'Kiloan'); ?></td>
													<td style="width: 8px;"><?= (!empty($row->berat)) ? $row->berat . ' Kg' : '-'; ?></td>
													<td style="min-width: 150px;"><strong><?= $row->nama_pelanggan; ?></strong></td>
													<td><?= $row->telp; ?></td>
													<td class="text-center">
														<?= (!empty($row->keterangan) ? $row->keterangan : '-'); ?>
													</td>
													<td><?= $row->user_fullname; ?></td>
													<td><?= rupiah($row->harga); ?></td>
													<td class="font-weight-bold"><?= rupiah($row->total); ?></td>
													<td class="text__16 tidakprint" style="display: inline-block; min-width: 50px;">
														<!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#formUbah<?= $row->kasmasuk_id; ?>" data-user_id="" title="Edit" class="mr-3 modalUbah"><span class="fa fa-pencil text-info"></span></a> -->

														<a href="<?= base_url('kas_masuk/delete/' . $row->kasmasuk_id); ?>" title="Delete" class="tombol-konfirmasi btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- col-md-12 -->
		</div>
	</div>
</div>
<!-- /page content -->

<!-- |====================================|Modal toggle box|========================================================-->
<!-- Tambah Data -->
<form action="<?= base_url('kas_masuk/tambah'); ?>" method="POST" enctype="multipart/form-data">
	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<span class="modal-title" style="font-weight: 550;" id="judul_modal">Tambah Data</span>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Tanggal</label>
							</div>
							<div class="col-md-10">
								<input type="text" class="form-control" name="kas_tanggal" value="<?= date('d-M-Y'); ?>" readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Banyaknya</label>
							</div>
							<div class="col-md-10">
								<input type="number" class="form-control" name="kas_banyaknya" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Keterangan</label>
							</div>
							<div class="col-md-10">
								<textarea name="kas_keterangan" rows="3" class="form-control" required></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Kode</label>
							</div>
							<div class="col-md-10">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text"><?= date('dmy'); ?>-</div>
									</div>
									<input type="number" class="form-control" name="kas_kode" required>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Total</label>
							</div>
							<div class="col-md-10">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Rp.</div>
									</div>
									<input type="number" class="form-control" name="kas_total" required>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn_flat btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-sm btn_flat btn-success">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- /.Modal tambah -->
<!-- Ubah Data -->
<?php
foreach ($kasmasuk->result() as $row) :
	$dKode = $row->kas_kode;
	$ex = explode('-', $dKode);
	$kode1 = $ex[0];
	$kode2 = $ex[1];
?>
	<form action="<?= base_url('kas_masuk/ubah'); ?>" method="POST" enctype="multipart/form-data">
		<div class="modal fade" id="formUbah<?= $row->kasmasuk_id; ?>" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<span class="modal-title" style="font-weight: 550;" id="judul_modal">Ubah Data</span>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Tanggal</label>
								</div>
								<div class="col-md-10">
									<input type="text" class="form-control" name="kas_tanggal" value="<?= date('d-M-Y', strtotime($row->kas_date)); ?>" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Banyaknya</label>
								</div>
								<div class="col-md-10">
									<input type="number" class="form-control" name="kas_banyaknya" value="<?= $row->kas_banyaknya; ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Keterangan</label>
								</div>
								<div class="col-md-10">
									<textarea name="kas_keterangan" rows="3" class="form-control" required><?= $row->kas_keterangan; ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Kode</label>
								</div>
								<div class="col-md-10">
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text"><?= $kode1; ?>-</div>
										</div>
										<input type="number" class="form-control" name="kas_kode" value="<?= $kode2; ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Total</label>
								</div>
								<div class="col-md-10">
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">Rp.</div>
										</div>
										<input type="number" class="form-control" name="kas_total" value="<?= $row->kas_total; ?>">
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="kode1" value="<?= $kode1; ?>">
						<input type="hidden" name="kasmasuk_id" value="<?= $row->kasmasuk_id; ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn_flat btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-sm btn_flat btn-success">Save</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php endforeach; ?>
<!-- /.Modal Ubah -->
