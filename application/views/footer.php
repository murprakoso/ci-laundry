<!-- footer content -->
<footer>
    <div class="pull-right">
        © <?= date('Y'); ?> All Right Reserved
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- dateRangepicker -->
<script src="<?= base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- NProgress -->
<script src="<?= base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
<!-- jQuery custom content scroller -->
<script src="<?= base_url(); ?>assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Datatables & Export -->
<script src="<?= base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/sweetalert/sa.script.js"></script>
<script src="<?= base_url(); ?>assets/vendors/toastr/toastr.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/vendors/summernote-master/summernote.min.js"></script> -->
<script src="<?= base_url(); ?>assets/vendors/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url(); ?>assets/vendors/summernote/lang/summernote-id-ID.js"></script>
<script src="<?= base_url(); ?>assets/js/dropify.min.js"></script>
<!-- Button Export -->
<script src="<?= base_url(); ?>assets/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/export/buttons.bootstrap.min.js"></script>
<!-- Button Export -->

<!-- Toastr -->
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    // toastr.success("Data Berhasil.");
    <?php if ($this->session->flashdata('success')) { ?>
        toastr.success("<?= $this->session->flashdata('success'); ?>");
    <?php } elseif ($this->session->flashdata('error')) { ?>
        toastr.error("<?= $this->session->flashdata('error'); ?>");
    <?php } elseif ($this->session->flashdata('warning')) { ?>
        toastr.warning("<?= $this->session->flashdata('warning'); ?>");
    <?php } elseif ($this->session->flashdata('info')) { ?>
        toastr.info("<?= $this->session->flashdata('info'); ?>");
    <?php } ?>
</script>

<!-- Script checkbox delete -->
<script type="text/javascript">
    $('#deleteall').hide();
    // select all checkbox
    $('#check-all').on('click', function(e) {
        var x = document.getElementById("deleteall");
        x.style.display = "block";
        if ($(this).is(':checked', true)) {
            $(".check-item").prop('checked', true);
        } else {
            $(".check-item").prop('checked', false);
            var x = document.getElementById("deleteall");
            x.style.display = "none";
        }
    });

    // set particular checked checkbox count
    $(".check-item").on('click', function(e) {
        var x = document.getElementById("deleteall");
        x.style.display = "block";
    });

    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        $("#check-all").click(function() { // Ketika user men-cek checkbox all
            if ($(this).is(":checked")) // Jika checkbox all diceklis
                $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
            else // Jika checkbox all tidak diceklis
                $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
        });

        $("#btn-delete").click(function() { // Ketika user mengklik tombol delete
            // var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
            Swal({
                title: 'Apakah anda yakin?',
                // text: "data mahasiswa akan dihapus",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.value) // Jika user mengklik tombol "Ok"
                    $("#form-delete").submit(); // Submit form
                else
                    $("#form-delete").location.reload();
            })
        });
    });
</script>

<!-- Fungsi export -->
<!-- <script type="text/javascript">
    $(function() {
        // var header1 = document.getElementById('example1').innerHTML;
        // console.log(header1);
        var judul = $('#titleprint').text();
        var t = $('#datatable').DataTable();

        t.on('order.dt search.dt print', function() {
            t.column(1, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        var buttons = new $.fn.dataTable.Buttons(t, {
            buttons: [{
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Cetak',
                    className: 'btn-sm btn-warning btn_flat',
                    autoPrint: true,
                    title: judul,
                    exportOptions: {
                        columns: ':not(.tidakprint)'
                    },

                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '10pt');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                        // $(win.document.body).find( 'thead' ).prepend('<div class="header-print">' + $('#dt-header').val() + '</div>');
                        $(win.document.body).find('h1').addClass('text-center');
                    }
                },
                // { extend : 'colvis', text:'Tampilkan Kolom' },
                {
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn-sm btn-light btn_flat text-black',

                    buttons: [{
                            extend: 'copy',
                            exportOptions: {
                                columns: ':not(.tidakprint)'
                            },
                        },
                        {
                            extend: 'csv',
                            title: judul,
                            exportOptions: {
                                columns: ':not(.tidakprint)'
                            },
                        },
                        {
                            extend: 'excel',
                            title: judul,
                            exportOptions: {
                                columns: ':not(.tidakprint)'
                            },
                        },
                        {
                            extend: 'pdf',
                            title: judul,
                            exportOptions: {
                                columns: ':not(.tidakprint)'
                            },
                        },

                    ]
                }
            ],

        }).container().appendTo($('#tt'));
        // datefilter mulai
        // datefilter end
    })
</script> -->


</body>

</html>