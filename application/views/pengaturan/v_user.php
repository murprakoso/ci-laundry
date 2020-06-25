<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-6">
				<h3 class="m-0" id="titleprint">User</h3>
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

			<div class="col-md-12 col-sm-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<table id="datatable" class="table table-hover" style="width:100%">
										<thead>
											<tr>
												<th>Photo</th>
												<th>Nama</th>
												<th>Username</th>
												<th>Email</th>
												<th>Level</th>
												<th class="tidakprint">
													<i class="fa fa-cog"></i>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($user->result() as $row) : ?>
												<tr>
													<td class="text-center">
														<?php if (!empty($row->user_photo)) : ?>
															<img src="<?= base_url('assets/images/' . $row->user_photo); ?>" class="mt-2" style="width: 45px; height:45px; object-position: center; object-fit: cover; border: solid 1px #dee2e6; border-radius: 50%;">
														<?php else : ?>
															<img src="<?= base_url('assets/images/default.jpg'); ?>" class="mt-2" style="width: 45px; height:45px; object-position: center; object-fit: cover; border: solid 1px #dee2e6; border-radius: 50%;">
														<?php endif; ?>
													</td>
													<td><?= $row->user_fullname; ?></td>
													<td><?= $row->user_name; ?></td>
													<td><?= $row->user_email; ?></td>
													<td>
														<?php
														if ($row->user_level == '1') {
															echo "Admin";
														} else {
															echo "User";
														}
														?>
													</td>
													<td class="text__16" class="tidakprint">
														<a href="javascript:void(0);" data-toggle="modal" data-target="#modalUbah<?= $row->user_id; ?>" data-user_id="" title="Edit" class="mr-3 modalUbah"><span class="fa fa-pencil"></span></a>

														<a href="<?= base_url('user/hapus/' . $row->user_id); ?>" title="Delete" class="tombol-konfirmasi"><span class="fa fa-trash"></span></a>
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


<!-- |====================================|Modal toggle box|========================================================-->
<!-- Tambah Data -->
<form action="<?= base_url('user/tambah'); ?>" method="POST" enctype="multipart/form-data">
	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<span class="modal-title" style="font-weight: 550;" id="judul_modal">Tambah User</span>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="file" name="filefoto" id="filefoto" class="dropify" data-height="220" data-default-file="">
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" name="user_fullname" id="user_fullname" class="form-control" placeholder="Nama Lengkap" required>
							</div>
							<div class="form-group">
								<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password" required>
							</div>
							<!-- <div class="form-group">
                                <select class="form-control" name="level" required>
                                    <option value="">No Selected</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div> -->
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
foreach ($user->result() as $row) :
?>
	<form action="<?= base_url('user/ubah'); ?>" method="POST" enctype="multipart/form-data">
		<div class="modal fade" id="modalUbah<?= $row->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<span class="modal-title" style="font-weight: 550;" id="judul_modal">Ubah User</span>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="file" name="filefoto" id="filefoto" class="dropify" data-height="220" data-default-file="<?php echo base_url() . 'assets/images/' . $row->user_photo; ?>">
								</div>
							</div>
							<div class=" col-md-8">
								<div class="form-group">
									<input type="text" name="user_fullname" value="<?= $row->user_fullname; ?>" class="form-control" placeholder="Nama Lengkap" required>
								</div>
								<div class="form-group">
									<input type="text" name="user_name" value="<?= $row->user_name; ?>" class="form-control" placeholder="Username" required>
								</div>
								<div class="form-group">
									<input type="email" name="user_email" value="<?= $row->user_email; ?>" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" value="" class="form-control" placeholder="Password">
								</div>
								<div class="form-group">
									<input type="password" name="password2" value="" class="form-control" placeholder="Konfirmasi Password">
								</div>
								<!-- <div class="form-group">
                                <select class="form-control" name="level" required>
                                    <option value="">No Selected</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div> -->
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<input type="hidden" name="user_id" value="<?= $row->user_id; ?>">
						<button type="button" class="btn btn-sm btn_flat btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-sm btn_flat btn-success">Save</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php endforeach; ?>
<!-- /.Modal ubah -->
