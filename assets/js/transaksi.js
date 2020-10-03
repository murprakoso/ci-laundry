$(document).ready(function () {
	// var base_url = "<?= base_url(); ?>";
	var datetime = new Date().today() + "-" + new Date().timeNow();

	// **
	// Tambah Transaksi
	//
	// *
	$(".addTransaksi").on("click", function () {
		$("#judul_modal").html("Tambah Data Transaksi ");
		$("form").attr("action", base_url + "transaksi/save");

		$("#item").prop("disabled", true);
		$("#tanggal").attr("readonly", true);
		$("#transaksi_id").val("");
		$("#tanggal").val(datetime);
		$("#nama").val("");
		$("#telp").val("");
		$("#tipe").val("");
		$("#berat").val("");
		$("#item").val("");
		$("#keterangan").val("");

		console.log(datetime);

		$("#tipe").on("change", function () {
			$("#berat").val("");
			$("#berat").html("");
			$("#item").val("");
			$("#item").html("");

			var tipe = $(this).children("option:selected").val();
			// console.log(tipe);

			if (tipe == 2) {
				// jika tipe == kiloan maka tampilkan form berat
				$("#berat").append(`
					<div class="row">
						<div class="col-md-2">
							<label>Berat(Kg)</label>
						</div>
						<div class="col-md-10">
							<input type="number" step="0.01"  class="form-control" name="berat" required>
						</div>
					</div>
				`);
			}

			$.ajax({
				url: base_url + "transaksi/getItem",
				method: "post",
				data: {
					tipe: tipe,
				},
				dataType: "JSON",

				success: function (results) {
					$("#item").prop("disabled", false);
					let data = results;
					// console.log(data);

					$("#item").append(`
						<option value="">- Pilih jenis item -</option>
					`);
					$.each(data, function (i, data) {
						$("#item").append(
							`
							<option value="` +
								data.item_id +
								`">` +
								data.item_nama +
								`</option>
						`
						);
					});
				},
			});
		});
	});

	// **
	//
	// Edit Transaksi
	// *
	$(".editTransaksi").on("click", function () {
		$("#item").prop("disabled", true);

		$("#berat").val("").html("");
		$("#item").val("").html("");

		$("#judul_modal").html("Ubah Data Transaksi ");
		$("form").attr("action", base_url + "transaksi/update");

		const transaksi_id = $(this).data("transaksi_id");
		const item_tipe = $(this).data("item_tipe");
		// const brt = '';

		$.ajax({
			url: base_url + "transaksi/getTransaksi",
			data: {
				transaksiId: transaksi_id,
			},
			method: "POST",
			dataType: "JSON",
			success: function (data) {
				// console.log(data);

				$("#transaksi_id").val(data.transaksi_id);
				$("#status").val(data.status);
				$("#tanggal").val(data.tanggal);
				$("#nama").val(data.nama_pelanggan);
				if (data.telp == 0) {
					$("#telp").val("");
				} else {
					$("#telp").val(data.telp);
				}
				$("#keterangan").val(data.keterangan);
				$("#tipe").val(data.item_tipe);

				// $('#item').val(data.item_id).html(data.item_nama);
				if (data.item_tipe == 2) {
					$("#berat").append(
						`
						<div class="row">
							<div class="col-md-2">
								<label>Berat(Kg)</label>
							</div>
							<div class="col-md-10">
								<input type="number" step="0.01" class="form-control" name="berat" value="` +
							data.berat +
							`" required>
							</div>
						</div>
					`
					);
				}
				//
			},
		}); // /.ajax

		$.ajax({
			url: base_url + "transaksi/getItem",
			method: "post",
			data: {
				tipe: item_tipe,
			},
			dataType: "JSON",

			success: function (results) {
				$("#item").prop("disabled", false);
				let data = results;
				// console.log(data);

				$("#item").append(`
					<option value="">- Pilih jenis item -</option>
				`);
				$.each(data, function (i, data) {
					$("#item").append(
						`
						<option value="` +
							data.item_id +
							`">` +
							data.item_nama +
							`</option>
					`
					);
				});
			},
		});

		$("#tipe").on("change", function () {
			$("#berat").val("");
			$("#berat").html("");
			$("#item").val("");
			$("#item").html("");

			var tipe = $(this).children("option:selected").val();

			if (tipe == 2) {
				// jika tipe == kiloan maka tampilkan form berat
				$("#berat").append(`
					<div class="row">
						<div class="col-md-2">
							<label>Berat(Kg)</label>
						</div>
						<div class="col-md-10">
							<input type="number" step="0.01" class="form-control" name="berat" required>
						</div>
					</div>
				`);
			}

			$.ajax({
				url: base_url + "transaksi/getItem",
				method: "post",
				data: {
					tipe: tipe,
				},
				dataType: "JSON",

				success: function (results) {
					$("#item").prop("disabled", false);
					let data = results;
					// console.log(data);

					$("#item").append(`
						<option value="">- Pilih jenis item -</option>
					`);
					$.each(data, function (i, data) {
						$("#item").append(
							`
							<option value="` +
								data.item_id +
								`">` +
								data.item_nama +
								`</option>
						`
						);
					});
				},
			});
		});
	});
	//

	// **
	// Refresh when modal box closed
	//
	// *
	var modalClosingMethod = "Programmatically";
	// On modal click, determine where the click occurs and set the variable accordingly
	$("#exampleModal").on("click", function (e) {
		if ($(e.target).parent().attr("data-dismiss")) {
			modalClosingMethod = "by Corner X";
		} else if ($(e.target).hasClass("btn-secondary")) {
			modalClosingMethod = "by Close Button";
		} else {
			modalClosingMethod = "by Background Overlay";
		}

		// Restore the variable "default" value
		setTimeout(function () {
			modalClosingMethod = "Programmatically";
		}, 500);
	});
	$("#formModal").on("hidden.bs.modal", function () {
		// console.log("Modal closed " + modalClosingMethod);
		location.reload();
	});
});
