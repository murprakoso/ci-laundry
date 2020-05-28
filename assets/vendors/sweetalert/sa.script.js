const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal({
		title: 'Data ',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}

/* tombol hapus */
$('.tombol-konfirmasi').on('click', function (e) {
	e.preventDefault()
	const href = $(this).attr('href');

	Swal({
		title: 'Apakah anda yakin?',
		// text: "data mahasiswa akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

})

/* tombol hapus */
$('.confirmAlert').on('click', function (e) {
	e.preventDefault()
	const href = $(this).attr('href');

	Swal({
		title: 'Are You Sure ?',
		// text: "data mahasiswa akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

})
