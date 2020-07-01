<div class="right_col" role="main" style="min-height: 100vh!important;">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-6">
				<h3 class="m-0" id="titleprint">Transaksi </h3>
			</div>
			<div class="col-md-6 m-0">
				<div class="kanan mt-2">
					<div class="btn-group">
						<button type="button" data-toggle="modal" data-target="#formModal" class="btn btn_flat btn-success btn-sm addTransaksi"><i class="fa fa-plus"></i> Tambah</button>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-1">

			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_content">

						<div class="row">
							<div class="col-lg-5 col-md-12 col-xs-12 pl-4">
								<!-- Form -->
								<form action="<?= base_url('transaksi'); ?>" method="post">
									<small>*Tampilkan data berdasarkan status</small>
									<div class="control-group">
										<div class="col-md-11 form-group row has-feedback mb-0">
											<div class="input-group">
												<select name="status" class="form-control" onchange="submit();">
													<option value="">-- Pilih status --</option>
													<option value="1">Order</option>
													<option value="2">Dikerjakan</option>
													<option value="3">Selesai</option>
													<option value="4">Diambil</option>
												</select>
											</div>
										</div>
										<button onClick="window.location.reload();" class="btn btn_flat"><i class="fa fa-refresh"></i></button>
									</div>
								</form>
							</div>
						</div>
						<hr>


						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<!--  -->
									<table id="datatable" class="table table-hover table-bordered table-striped" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Status</th>
												<th>Pelanggan</th>
												<th class="mw-150">No Telp.</th>
												<th>Tanggal</th>
												<th>Tipe</th>
												<th>Keterangan</th>
												<th>Petugas</th>
												<th>Harga</th>
												<th>Berat(Kg)</th>
												<th>Potongan</th>
												<th class="mw-90">Total</th>
												<th class="tidakprint mw-50">
													<i class="fa fa-cog"></i>
												</th>
											</tr>
										</thead>

										<tbody>
											<?php $no = 1; ?>
											<?php foreach ($transaksi->result() as $row) : ?>
												<tr>
													<td><?= $no++; ?></td>
													<td data-toggle="modal" data-target="#formStatus<?= $row->transaksi_id; ?>" class="pointer">
														<?php if ($row->status == 1) : ?>
															<div class="alert text-center alert-info">
																Order
															</div>
														<?php elseif ($row->status == 2) : ?>
															<div class="alert text-center alert-primary">
																Dikerjakan
															</div>
														<?php elseif ($row->status == 3) : ?>
															<div class="alert text-center alert-success">
																Selesai
															</div>
														<?php elseif ($row->status == 4) : ?>
															<div class="alert text-center alert-secondary">
																Diambil
															</div>
														<?php endif; ?>
													</td>
													<td class="font-weight-bold">
														<?= $row->nama_pelanggan; ?>
													</td>
													<td><?= (!empty($row->telp) ? $row->telp : '-'); ?></td>
													<td><?= date('d-M-Y', strtotime($row->tanggal)); ?></td>
													<td><?= ($row->item_tipe == 1 ? 'Satuan' : 'Kiloan'); ?></td>
													<td><?= (!empty($row->keterangan) ? $row->keterangan : '-'); ?></td>
													<td class="font-weight-bold"><?= $row->user_fullname; ?></td>
													<td><?= rupiah($row->harga); ?></td>
													<!-- berat -->
													<?php if (!empty($row->berat) && $row->berat != 0.00) : ?>
														<td><?= $row->berat . ' Kg'; ?></td>
													<?php else : ?>
														<td>-</td>
													<?php endif; ?>

													<td><?= (!empty($row->item_diskon) ? rupiah($row->item_diskon) : '-'); ?></td>
													<td class="font-weight-bold"><?= rupiah($row->total); ?></td>
													<td class="text__16">
														<?php if ($row->status != 4) : ?>
															<a href="javascript:void(0);" data-toggle="modal" data-target="#formModal" data-transaksi_id="<?= $row->transaksi_id; ?>" data-item_tipe="<?= $row->item_tipe; ?>" title="Edit" class="mr-3 editTransaksi"><span class="fa fa-pencil text-info"></span></a>
														<?php endif; ?>

														<a href="<?= base_url('transaksi/delete/' . $row->transaksi_id); ?>" title="Delete" class="tombol-konfirmasi"><span class="fa fa-trash text-danger"></span></a>
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
			</div>

		</div>

	</div>
</div>


<!-- modal form tambah & update Data || proses in assets/js/transaksi.js -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<span class="modal-title" style="font-weight: 550;" id="judul_modal">Tambah Transaksi Baru</span>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="transaksi_id" id="transaksi_id" hidden>
				<input type="hidden" name="status" id="status" hidden>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Tanggal</label>
							</div>
							<div class="col-md-4">
								<input type="date" class="form-control" name="tanggal" id="tanggal" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Nama Pelanggan</label>
							</div>
							<div class="col-md-10">
								<input type="text" class="form-control" name="nama" id="nama" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>No Telp.</label>
							</div>
							<div class="col-md-10">
								<input type="text" class="form-control" name="telp" id="telp" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Tipe</label>
							</div>
							<div class="col-md-10">
								<select name="tipe" class="form-control tipe" id="tipe" required>
									<option value="">- Pilih tipe -</option>
									<option value="1">Satuan</option>
									<option value="2">Kiloan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group" id="berat">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Jenis Item</label>
							</div>
							<div class="col-md-10">
								<select name="item" class="form-control" id="item" disabled required>
									<option value="">- Pilih jenis item -</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Keterangan</label>
							</div>
							<div class="col-md-10">
								<textarea name="keterangan" id="keterangan" class="form-control" rows="2" placeholder="(Optional)"></textarea>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn_flat btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-sm btn_flat btn-success">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.Modal tambah -->


<!-- UPdate Status Transaksi-->
<?php foreach ($transaksi->result() as $row) : ?>
	<div class="modal fade" id="formStatus<?= $row->transaksi_id; ?>" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<span class="modal-title" style="font-weight: 550;" id="judul_modal">Update Status Transaksi </span>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('transaksi/update_status'); ?>" method="POST">
					<div class="input-hidden">
						<input type="hidden" name="berat" value="<?= $row->berat; ?>">
						<input type="hidden" name="pelanggan" value="<?= $row->nama_pelanggan; ?>">
						<input type="hidden" name="telp" value="<?= $row->telp; ?>">
						<input type="hidden" name="keterangan" value="<?= $row->keterangan; ?>">
						<input type="hidden" name="tanggal" value="<?= $row->tanggal; ?>">
						<input type="hidden" name="user_id" value="<?= $row->user_id; ?>">
						<input type="hidden" name="tipe" value="<?= $row->item_tipe; ?>">
						<input type="hidden" name="harga" value="<?= $row->harga; ?>">
						<input type="hidden" name="total" value="<?= $row->total; ?>">
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label>Nama Pelanggan</label>
								</div>
								<div class="col-md-9">
									<strong><?= $row->nama_pelanggan; ?></strong>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label>Tipe</label>
								</div>
								<div class="col-md-9">
									<strong><?= ($row->item_tipe == 1 ? 'Satuan' : 'Kiloan'); ?></strong>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label>Total</label>
								</div>
								<div class="col-md-9">
									<strong><?= rupiah($row->total); ?></strong>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label>Status</label>
								</div>
								<div class="col-md-9">
									<?php if ($row->status != 4) : ?>
										<select name="status" class="form-control" required>
											<option value="">- Pilih Status -</option>
											<option value="1">Order</option>
											<option value="2">Dikerjakan</option>
											<option value="3">Selesai</option>
											<option value="4">Diambil</option>
										</select>
									<?php else : ?>
										<div class="row">
											<div class="alert alert-secondary">Diambil</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<input type="hidden" name="transaksi_id" value="<?= $row->transaksi_id; ?>">
						<button type="button" class="btn btn-sm btn_flat btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-sm btn_flat btn-success">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
