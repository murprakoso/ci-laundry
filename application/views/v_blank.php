<!-- page content -->
<!-- <div class="right_col" role="main" style="min-height: 100vh;"> -->
<div class="right_col" role="main" style="min-height: 100vh!important;">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-6">
                <h3 class="m-0" id="titleprint">Kas Keluar</h3>
            </div>
            <div class="col-md-6 m-0">
                <div class="kanan mt-2">
                    <div class="btn-group">
                        <div id="deleteall">
                            <button type="button" form="form-delete" id="btn-delete" class="btn btn-sm btn-danger btn_flat text-white mr-2">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <button type="button" data-toggle="modal" data-target="#formModal" class="btn btn_flat btn-success btn-sm tombolTambahData"><i class="fa fa-plus"></i> Tambah</button>
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


<?php echo $footer; ?>