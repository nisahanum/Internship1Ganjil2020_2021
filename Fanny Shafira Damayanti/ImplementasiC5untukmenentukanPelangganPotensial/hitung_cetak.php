<?php
$hasil = $_GET['hasil'];
if ($hasil == 'Tidak')
    $hasil = 'Tidak Potensial';
?>
<h1>Perusahaan <?= $hasil ?></h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Perusahaan</th>
            <th>Jenis</th>
            <th>Jumlah Transaksi</th>
            <th>Total Uang</th>
            <th>Hasil</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_hasil WHERE hasil='$_GET[hasil]'");

    //echo '<pre>' . print_r($rows, 1) . '</pre>';

    $no = $offset;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->tahun ?></td>
            <td><?= $row->bulan ?></td>
            <td><?= $row->perusahaan ?></td>
            <td><?= $row->jenis ?></td>
            <td><?= number_format($row->jumlah) ?></td>
            <td><?= rp($row->total) ?></td>
            <td><?= $row->hasil ?></td>
        </tr>
    <?php endforeach; ?>
</table>