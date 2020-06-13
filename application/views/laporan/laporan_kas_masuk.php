<!DOCTYPE html>
<html lang="en">
<?php error_reporting(0); ?>

<head>
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
</head>

<body>
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
            <td class="center td-bold">TOTAL</td>
            <td class="center td-bold">DEBET</td>
        </tr>

        <?php
        $no = 0;
        foreach ($kasmasuk->result() as $row) : ?>
            <tr>
                <td style="text-align: center;"><?= ++$no; ?></td>
                <td><?= tgl_indo(date('Y-m-d', strtotime($row->rekap_date))); ?></td>
                <td><?= rupiah($row->rekap_total); ?></td>
                <td><?= rupiah($row->rekap_debit); ?></td>
            </tr>
            <?php
            $total1 += $row->rekap_total;
            $total2 += $row->rekap_debit;
            ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="2" class="td-bold">TOTAL</td>
            <td class="td-bold"><?= rupiah($total1); ?></td>
            <td class="td-bold"><?= rupiah($total2); ?></td>
        </tr>
    </table>

</body>

</html>