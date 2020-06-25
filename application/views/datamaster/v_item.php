<div class="right_col" role="main" style="min-height: 100vh!important;">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-6">
				<h3 class="m-0" id="titleprint">Item </h3>
			</div>
			<div class="col-md-6 m-0">
				<div class="kanan mt-2">
					<div class="btn-group">
						<button type="button" data-toggle="modal" data-target="#formModal" class="btn btn_flat btn-success btn-sm tombolTambahData"><i class="fa fa-plus"></i> Tambah</button>
					</div>
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
									<!--  -->
									<table id="datatable" class="table table-hover table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Item</th>
												<th>Tipe</th>
												<th>Harga Satuan</th>
												<th>Harga per (1KG)</th>
												<th>Potongan Harga</th>
												<th class="tidakprint">
													<i class="fa fa-cog"></i>
												</th>
											</tr>
										</thead>

										<tbody>
											<?php foreach ($items->result() as $row) : ?>
												<tr>
													<td><?= $row->item_id; ?></td>
													<td><?= (!empty($row->item_nama) ? $row->item_nama : '-'); ?></td>
													<td>
														<?= ($row->item_tipe == 1 ? 'Satuan' : 'Kilo'); ?>
													</td>
													<td><?= ($row->item_tipe == 1 ?  rupiah($row->item_harga) : '-'); ?></td>
													<td><?= ($row->item_tipe == 2 ?  rupiah($row->item_harga) : '-'); ?></td>
													<td><?= (!empty($row->item_diskon) ? $row->item_diskon : '-'); ?></td>
													<td class="text__16">
														<a href="javascript:void(0);" data-toggle="modal" data-target="#formUbah<?= $row->item_id; ?>" data-user_id="" title="Edit" class="mr-3 modalUbah"><span class="fa fa-pencil text-info"></span></a>

														<a href="<?= base_url('item/delete/' . $row->item_id); ?>" title="Delete" class="tombol-konfirmasi"><span class="fa fa-trash text-danger"></span></a>
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


<!-- Tambah Data -->
<form action="<?= base_url('item/save'); ?>" method="POST" enctype="multipart/form-data">
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
								<label>Nama Item</label>
							</div>
							<div class="col-md-10">
								<input type="text" class="form-control" name="nama">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Tipe</label>
							</div>
							<div class="col-md-10">
								<select name="tipe" class="form-control" required>
									<option value="">- Pilih tipe -</option>
									<option value="1">Satuan</option>
									<option value="2">Kiloan</option>
								</select>
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
									<input type="number" class="form-control" name="harga" min="1">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label>Potongan Harga</label>
							</div>
							<div class="col-md-10">
								<small>*Kosongkan jika tidak ada potongan harga</small>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Rp.</div>
									</div>
									<input type="number" class="form-control" name="diskon" placeholder="(Optional)" min="1">
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

<!-- Tambah Ubah -->
<?php foreach ($items->result() as $row) : ?>
	<form action="<?= base_url('item/update'); ?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $row->item_id; ?>">
		<div class="modal fade" id="formUbah<?= $row->item_id; ?>" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
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
									<label>Nama Item</label>
								</div>
								<div class="col-md-10">
									<input type="text" class="form-control" name="nama" value="<?= $row->item_nama; ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Tipe</label>
								</div>
								<div class="col-md-10">
									<select name="tipe" class="form-control" required>
										<option value="">- Pilih tipe -</option>
										<option value="1" <?= ($row->item_tipe == 1 ? 'selected' : '') ?>>Satuan</option>
										<option value="2" <?= ($row->item_tipe == 2 ? 'selected' : '') ?>>Kiloan</option>
									</select>
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
										<input type="number" class="form-control" name="harga" value="<?= $row->item_harga; ?>" min="1">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label>Potongan Harga</label>
								</div>
								<div class="col-md-10">
									<small>*Kosongkan jika tidak ada potongan harga</small>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">Rp.</div>
										</div>
										<input type="number" class="form-control" name="diskon" placeholder="(Optional)" value="<?= (!empty($row->item_diskon) ? $row->item_diskon : ''); ?>" min="1">
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
<?php endforeach; ?>
<!-- /.Modal Ubah -->
