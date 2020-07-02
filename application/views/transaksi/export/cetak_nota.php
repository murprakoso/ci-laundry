<?php
// error_reporting(0);
$row = $transaksi->row_array();
?>
<!DOCTYPE html>
<?php echo '<html><head>'; ?>
<title>Cetak Nota Transaksi</title>
<style>
	table,
	th,
	td {
		border: 1px solid black;
		border-collapse: collapse;
		border: none;
	}

	.td-bold {
		font-weight: bold;
	}

	.center {
		text-align: center;
	}
</style>
<?php echo '</head><body>'; ?>
<p style="text-align: left; font-weight: bold;text-transform: capitalize;">
	Almal Laundry 2<br>
	Jl. Sepakat II Ahmad Yani Samping Gg. Melati, Pontianak, Kalimantan Barat
</p>
<hr style="height: 2px; color: #000; margin: 10px 0 20px 0;">
<table style="margin-bottom: 20px;">
	<tr>
		<td>Tgl </td>
		<td> : </td>
		<td> <?= tgl_indo(date('Y-m-d', strtotime($row['tanggal']))); ?></td>
	</tr>
	<tr>
		<td>Petugas </td>
		<td> : </td>
		<td> <?= $row['user_fullname']; ?></td>
	</tr>
	<tr>
		<td>Nama </td>
		<td> : </td>
		<td style="text-transform: capitalize;"><strong><?= $row['nama_pelanggan']; ?></strong></td>
	</tr>
</table>

<hr style="height: 2px; color: #000; margin: 15px 0 10px 0;">
<hr style="height: 0px; color: #000; margin: 5px 0 20px 0;">

<table style="margin-bottom: 20px;">
	<tr>
		<td>Tipe Laundry </td>
		<td> : </td>
		<td><?= ($row['item_tipe'] == 1 ? 'Satuan/' . $row['item_nama'] : 'Kiloan/' . $row['item_nama']) ?></td>
	</tr>
	<tr>
		<td>Berat (Kg)</td>
		<td> : </td>
		<?php if (!empty($row['berat']) && $row['berat'] != 0.00) : ?>
			<td><?= $row['berat'] . ' Kg'; ?></td>
		<?php else : ?>
			<td>-</td>
		<?php endif; ?>
	</tr>
	<tr>
		<td>Harga /Kg</td>
		<td> : </td>
		<td><?= rupiah($row['harga']); ?></td>
	</tr>
	<tr>
		<td>Diskon</td>
		<td> : </td>
		<td><?= rupiah($row['item_diskon']); ?></td>
	</tr>
	<tr>
		<td>Bayar</td>
		<td> : </td>
		<td><?= rupiah($row['total']); ?></td>
	</tr>
</table>

<hr style="height: 0px; color: #000; margin: 5px 0 20px 0;">

<table style="margin-bottom: 20px;">
	<tr>
		<td>Status </td>
		<td> : </td>
		<td>
			<?php if ($row['status'] == 1) : ?>
				Order
			<?php elseif ($row['status'] == 2) : ?>
				Dikerjakan
			<?php elseif ($row['status'] == 3) : ?>
				Selesai
			<?php elseif ($row['status'] == 4) : ?>
				Diambil
			<?php endif; ?>
		</td>
	</tr>
</table>

<hr style="height: 2px; color: #000; margin: 15px 0 10px 0;">

<ol style="padding:20px;">
	<li>Pakaian luntur bukan menjadi tanggung jawab laundry jika tanpa pemberitahuan </li>
	<li>Komplain kami layani 1x24 jam</li>
	<li>Pengambilan laundry lebih dari 1 bulan bukan menjadi tanggung jawab laundry</li>
</ol>
<p>SEMOGA PUAS DENGAN LAYANAN KAMI. TERIMA KASIH</p>

<?php echo '</body></html>'; ?>
