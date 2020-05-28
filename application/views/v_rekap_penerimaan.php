<!-- page content -->
<div class="right_col" role="main" style="min-height: 100vh!important;">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-6">
                <h3 class="m-0" id="titleprint">Rekap Penerimaan Kas</h3>
            </div>
            <div class="col-md-6 m-0">
                <div class="kanan mt-2">
                    <div class="btn-group">
                        <div id="deleteall">
                            <button type="button" form="form-delete" id="btn-delete" class="btn btn-sm btn-danger btn_flat text-white mr-2">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <!-- <button type=" button" data-toggle="modal" data-target="#formModal" class="btn btn_flat btn-success btn-sm tombolTambahData"><i class="fa fa-plus"></i> Tambah</button> -->
                    </div>
                    <a id="tt">
                    </a>
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
                                <form action="<?= base_url('rekap-penerimaan'); ?>" method="post">
                                    <div class="control-group">
                                        <div class="col-md-11 xdisplay_inputx form-group row has-feedback mb-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control has-feedback-left" id="datepicker" placeholder="Pilih bulan & tahun .." name="rekap_date" autocomplete="off">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success btn_flat" type="submit"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <button onClick="window.location.reload();" class="btn btn_flat"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-hover table-bordered" style="width:100%">
                                        <form action="<?= base_url('rekap_penerimaan/hapus_rekap'); ?>" method="POST" id="form-delete"></form>
                                        <thead>
                                            <tr>
                                                <th class="tidakprint">
                                                    <input type="checkbox" class="checkmarkall" id="check-all">
                                                </th>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Banyaknya</th>
                                                <th>Keterangan</th>
                                                <th>Kode</th>
                                                <th>Total</th>
                                                <th>Debet</th>
                                                <!-- <th class="tidakprint">
                                                    <i class="fa fa-cog"></i>
                                                </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($rekappenerimaan->result() as $row) : ?>
                                                <tr>
                                                    <td style="width: 5px;" class="tidakprint">
                                                        <input type="checkbox" class="check-item" form="form-delete" name="rekap_id[]" value="<?= $row->rekap_id; ?>">
                                                    </td>
                                                    <td style="width: 5px;"><?= ++$no; ?></td>
                                                    <td><?= date('d-M-Y', strtotime($row->rekap_date)); ?></td>
                                                    <td style="width: 5px;"><?= $row->rekap_banyaknya; ?></td>
                                                    <td style="min-width: 150px;"><?= $row->rekap_keterangan; ?></td>
                                                    <td><?= $row->rekap_kode; ?></td>
                                                    <td><?= rupiah($row->rekap_total); ?></td>
                                                    <td><?= rupiah($row->rekap_debit); ?></td>
                                                    <!-- <td class="text__16 tidakprint">
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#formUbah" data-user_id="" title="Edit" class="mr-3 modalUbah"><span class="fa fa-pencil"></span></a>

                                                        <a href="<?= base_url('rekap_penerimaan/hapus/' . $row->rekap_id); ?>" title="Delete" class="tombol-konfirmasi"><span class="fa fa-trash"></span></a>
                                                    </td> -->
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

<?php echo $footer; ?>

<script type="text/javascript">
    $("#datepicker").datepicker({
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"
    });
</script>