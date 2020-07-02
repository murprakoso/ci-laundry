<?php error_reporting(0); ?>
<!DOCTYPE html>
<?php echo '<html><head>'; ?>

<title>Cetak Laporan Kas Masuk</title>
<!-- <link href="<?= base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet"> -->
<style>
	table,
	th,
	td {
		border: 1px solid black;
		border-collapse: collapse;
	}

	.td-bold {
		font-weight: bold;
	}

	.center {
		text-align: center;
	}
</style>
<?php echo '</head><body>'; ?>

<?php if (!empty($bulan || $tahun)) : ?>
	<p style="text-align: center; font-weight: bold;text-transform: uppercase;">
		LAPORAN KAS MASUK <br>
		ALMAL LAUNDRY <br>
		BULAN <?= bulan_indo($bulan); ?> TAHUN <?= $tahun; ?>
	</p>
<?php else : ?>
	<p style="text-align: center; font-weight: bold;text-transform: uppercase;">
		LAPORAN KAS MASUK <br>
		ALMAL LAUNDRY <br>
		PERIODE <?= tgl_indo(date('Y-m-d', strtotime($tgl_awal))); ?> s/d <?= tgl_indo(date('Y-m-d', strtotime($tgl_akhir))); ?>
	</p>
<?php endif; ?>
<hr style="height: 2px; color: #000; margin: 10px 0 20px 0 ;">
<table cellpadding="8" cellspacing="0" style="width:100%;">
	<tr>
		<td class="center td-bold">NO.</td>
		<td class="center td-bold">TANGGAL TRANSAKSI</td>
		<td class="center td-bold">PELANGGAN</td>
		<td class="center td-bold">TIPE</td>
		<td class="center td-bold">BERAT</td>
		<td class="center td-bold">TOTAL</td>
	</tr>

	<?php
	$no = 0;
	foreach ($kasmasuk->result() as $row) : ?>
		<tr>
			<td style="text-align: center;"><?= ++$no; ?></td>
			<td><?= tgl_indo(date('Y-m-d', strtotime($row->tanggal))); ?></td>
			<td><?= $row->nama_pelanggan; ?></td>
			<td><?= ($row->tipe == 1 ? 'Satuan' : 'Kiloan'); ?></td>
			<td><?= ($row->tipe != 1) ? $row->berat . '(Kg)' : '-'; ?></td>
			<td><?= rupiah($row->total); ?></td>
		</tr>
		<?php
		$total1 += $row->berat;
		$total2 += $row->total;
		?>
	<?php endforeach; ?>
	<tr>
		<td colspan="4" class="td-bold">TOTAL</td>
		<td class="td-bold"><?= $total1 . '(Kg)'; ?></td>
		<td class="td-bold"><?= rupiah($total2); ?></td>
	</tr>
</table>

<?php echo '</body></html>'; ?>
