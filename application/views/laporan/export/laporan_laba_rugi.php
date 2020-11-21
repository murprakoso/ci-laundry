<?php error_reporting(0); ?>
<!DOCTYPE html>
<?php echo '<html><head>'; ?>
<title>Cetak Laporan Laba Rugi</title>
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
		LAPORAN LABA RUGI <br>
		ALMAL LAUNDRY <br>
		BULAN <?= bulan_indo($bulan); ?> TAHUN <?= $tahun; ?>
	</p>
<?php else : ?>
	<p style="text-align: center; font-weight: bold;text-transform: uppercase;">
		LAPORAN LABA RUGI <br>
		ALMAL LAUNDRY <br>
		PERIODE <?= tgl_indo(date('Y-m-d', strtotime($tgl_awal))); ?> <span>s/d</span> <?= tgl_indo(date('Y-m-d', strtotime($tgl_akhir))); ?>
	</p>
<?php endif; ?>
<hr style="height: 2px; color: #000; margin: 10px 0 20px 0 ;">
<table cellpadding="8" cellspacing="0" style="width:100%;">
	<tr>
		<td class="center td-bold">NO.</td>
		<td class="center td-bold">TANGGAL TRANSAKSI</td>
		<td class="center td-bold">DEBET</td>
		<td class="center td-bold">KREDIT</td>
		<td class="center td-bold">LABA RUGI</td>
	</tr>

	<?php
	$no = 0;
	foreach ($debit->result() as $row) :
		++$no;
	?>
		<tr>
			<td style="text-align: center;"><?= $no; ?></td>
			<td><?= tgl_indo(date('Y-m-d', strtotime($row->tanggal))); ?></td>
			<td><?= (!empty($row->total) ? rupiah($row->total) : '-'); ?></td>
			<td>-</td>
			<td><?= rupiah($row->total); ?></td>
		</tr>
		<?php
		$totalDebit += $row->total;
		?>
	<?php endforeach; ?>
	<!--  -->
	<?php
	foreach ($kredit->result() as $row) :
		++$no;
	?>
		<tr>
			<td style="text-align: center;"><?= $no; ?></td>
			<td><?= tgl_indo(date('Y-m-d', strtotime($row->tanggal))); ?></td>
			<td>-</td>
			<td><?= (!empty($row->total) ? rupiah('-' . $row->total) : '-'); ?></td>
			<td><?= rupiah('-' . $row->total); ?></td>
		</tr>
		<?php
		$totalKredit += $row->total;
		?>
	<?php endforeach; ?>
	<tr>
		<td colspan="2" class="td-bold">TOTAL</td>
		<td class="td-bold"><?= rupiah($totalDebit); ?></td>
		<td class="td-bold"><?= rupiah('-' . $totalKredit); ?></td>
		<td class="td-bold"><?= rupiah($totalDebit - $totalKredit); ?></td>
	</tr>
</table>

<?php echo '</body></html>'; ?>