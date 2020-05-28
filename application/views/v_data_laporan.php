<!-- page content -->
<!-- <div class="right_col" role="main" style="min-height: 100vh;"> -->
<div class="right_col" role="main" style="min-height: 100vh!important;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Laporan </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 pull-right">
                    <div class="row">

                        <!-- <a href="<?= base_url(''); ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a> -->
                        <button type="button" data-toggle="modal" data-target="#formModal" class="btn btn_flat btn-success btn-sm tombolTambahData"><i class="fa fa-plus"></i> Tambah</button>
                        <a id="tt">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Post Title</th>
                                                <th>Page</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>test</td>
                                                <td>test
                                                </td>
                                                <td>test</td>
                                                <td class="text__16">
                                                    <a href="<?= base_url(); ?>backend/post/edit/" title="Edit" class="mr-3"><span class="fa fa-pencil"></span></a>

                                                    <a href="<?= base_url(); ?>backend/post/delete/" title="Delete" class="tombol-konfirmasi"><span class="fa fa-trash"></span></a>
                                                </td>
                                            </tr>
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
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" style="font-weight: 550;" id="judul_modal">Add Data Product</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Nama Produk</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="nama_product" id="nama_product" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Kategori</label>
                            </div>
                            <div class="col-md-10">
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori ...</option>
                                    <option value="batik">Batik</option>
                                    <option value="wayang kulit">Wayang Kulit</option>
                                    <option value="kerajinan">Kerajinan</option>
                                    <option value="souvenir">Souvenir</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Brand/Merek</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="brand" id="brand" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Keterangan</label>
                            </div>
                            <div class="col-md-10">
                                <textarea name="keterangan" id="keterangan" rows="3" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Harga</label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" name="harga" id="harga" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Stok</label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" name="stok" id="stok" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Foto</label>
                            </div>
                            <div class="col-md-10">
                                <img id="fotoproduk" src="<?= base_url(); ?>assets/images/product/bgnoimage.png" style="width: 200px; height: 150px; object-fit: contain;"><br>
                                <input type="hidden" name="fotolama" id="fotolama">
                                <input type="file" name="foto" id="foto" onchange="readURLA(this);">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn_flat btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn_flat btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.Modal tambah -->

<?php echo $footer; ?>