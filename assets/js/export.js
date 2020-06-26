$(function () {
	// var header1 = document.getElementById('example1').innerHTML;
	// console.log(header1);
	var judul = $('#titleprint').text();
	var t = $('#datatable').DataTable();

	t.on('order.dt search.dt print', function () {
		t.column(1, {
			search: 'applied',
			order: 'applied'
		}).nodes().each(function (cell, i) {
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

				customize: function (win) {
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
});
