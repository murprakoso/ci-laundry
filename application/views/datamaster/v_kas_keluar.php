<!-- page content -->
<!-- <div class="right_col" role="main" style="min-height: 100vh;"> -->
<div class="right_col" role="main" style="min-height: 100vh!important;">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-6">
				<h3 class="m-0" id="titleprint">Kas Keluar </h3>
			</div>
			<div class="col-md-6 m-0">
				<div class="kanan mt-2">
					<div class="btn-group">
						<div id="deleteall">
							<button type="button" form="form-delete" id="btn-delete" class="btn btn-sm btn-danger btn_flat text-white">
								<i class="fa fa-trash"></i>
							</button>
						</div>
						<button type="button" data-toggle="modal" data-target="#formModal" class="btn btn_flat btn-success btn-sm tombolTambahData ml-2"><i class="fa fa-plus"></i> Tambah</button>
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
										<form action="<?= base_url('kas_keluar/deletes'); ?>" method="POST" id="form-delete"></form>
										<thead>
											<tr>
												<th class="tidakprint">
													<input type="checkbox" class="checkmarkall" id="check-all">
												</th>
												<th>No.</th>
												<th class="mw-100">Tanggal</th>
												<th>Banyaknya</th>
												<th class="mw-100">Nama Toko</th>
												<th>No Telp.</th>
												<th>Keterangan</th>
												<th>Petugas</th>
												<th>Harga</th>
												<th>Total</th>
												<th class="tidakprint">
													<i class="fa fa-cog"></i>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											foreach ($kaskeluar->result() as $row) :
											?>
												<tr>
													<td style="width: 5px;">
														<input type="checkbox" class="check-item" form="form-delete" name="kaskeluar_id[]" value="<?= $row->kaskeluar_id; ?>">
													</td>
													<td style="width: 5px;"><?= ++$no; ?></td>
													<td>
														<?= date('d-M-Y', strtotime($row->tanggal)); ?>
													</td>
													<td style="width: 8px;" class="text-center">
														<?= $row->banyaknya; ?>
													</td>
													<td><?= $row->nama_toko; ?></td>
													<td>
														<?= (!empty($row->telp) ? $row->telp : '-'); ?>
													</td>
													<td style="min-width: 150px;">
														<?= (!empty($row->keterangan) ? $row->keterangan : '-'); ?>
													</td>
													<td><?= $row->user_fullname; ?></td>
													<td><?= rupiah($row->harga); ?></td>
													<td><?= rupiah($row->total); ?></td>
													<td class="text__16" style="display: inline-block;min-width: 50px;">
														<a href="javascript:void(0);" data-toggle="modal" data-target="#formUbah<?= $row->kaskeluar_id; ?>" data-user_id="" title="Edit" class="mr-3 modalUbah"><span class="fa fa-pencil text-info"></span></a>

														<a href="<?= base_url('kas_keluar/delete/' . $row->kaskeluar_id); ?>" title="Delete" class="tombol-konfirmasi"><span class="fa fa-trash text-danger"></span></a>
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
			<!-- col-md-12 -->
		</div>
	</div>
</div>
<!-- /page content -->

<!-- |====================================|Modal toggle box|========================================================-->
<!-- Tambah Data -->
<form action="<?= base_url('kas_keluar/save'); ?>" method="POST" enctype="multipart/form-data">
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
							<div class="col-md-3">
								<input type="date" class="form-control" name="tanggal" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Banyaknya</label>
							</div>
							<div class="col-md-10">
								<input type="number" class="form-control" name="banyaknya" value="1" min="1" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Nama Toko</label>
							</div>
							<div class="col-md-10">
								<input type="text" class="form-control" name="nama_toko" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>No Telp.</label>
							</div>
							<div class="col-md-10">
								<input type="text" class="form-control" name="telp" placeholder="(Optional)">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Keterangan</label>
							</div>
							<div class="col-md-10">
								<textarea name="keterangan" rows="3" class="form-control" placeholder="(Optional)"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Harga</label>
							</div>
							<div class="col-md-10">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Rp.</div>
									</div>
									<input type="number" class="form-control" name="harga" min="1" required>
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
<?php foreach ($kaskeluar->result() as $row) : ?>
	<form action="<?= base_url('kas_keluar/update'); ?>" method="POST" enctype="multipart/form-data">
		<div class="modal fade" id="formUbah<?= $row->kaskeluar_id; ?>" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
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
								<div class="col-md-3">
									<input type="date" class="form-control" name="tanggal" value="<?= $row->tanggal; ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Banyaknya</label>
								</div>
								<div class="col-md-10">
									<input type="number" class="form-control" name="banyaknya" min="1" value="<?= $row->banyaknya; ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Nama Toko</label>
								</div>
								<div class="col-md-10">
									<input type="text" class="form-control" name="nama_toko" value="<?= $row->nama_toko; ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>No Telp.</label>
								</div>
								<div class="col-md-10">
									<input type="text" class="form-control" name="telp" placeholder="(Optional)" value="<?= $row->telp; ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Keterangan</label>
								</div>
								<div class="col-md-10">
									<textarea name="keterangan" rows="3" class="form-control" placeholder="(Optional)"><?= $row->keterangan; ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Harga</label>
								</div>
								<div class="col-md-10">
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">Rp.</div>
										</div>
										<input type="number" class="form-control" name="harga" min="1" value="<?= $row->harga; ?>" required>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="kas_id" value="<?= $row->kaskeluar_id; ?>">
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
