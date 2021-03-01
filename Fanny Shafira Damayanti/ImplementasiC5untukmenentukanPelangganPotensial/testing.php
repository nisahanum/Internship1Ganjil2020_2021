<div class="page-header">
    <h1>Testing</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="testing" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
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
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT YEAR(tanggal) AS tahun, MONTH(tanggal) AS bulan, p.nama_perusahaan, j.nama_jenis, COUNT(*) AS jumlah, SUM(harga) AS total
        FROM tb_transaksi t INNER JOIN tb_perusahaan p ON p.id_perusahaan=t.id_perusahaan INNER JOIN tb_jenis j ON j.id_jenis=t.id_jenis
        WHERE nama_perusahaan LIKE '%$q%' OR nama_jenis LIKE '%$q%'
        GROUP BY YEAR(tanggal), MONTH(tanggal), p.id_perusahaan, j.nama_jenis ORDER BY tanggal");

            //echo '<pre>' . print_r($rows, 1) . '</pre>';

            $no = $offset;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->tahun ?></td>
                    <td><?= $BULAN[$row->bulan] ?></td>
                    <td><?= $row->nama_perusahaan ?></td>
                    <td><?= $row->nama_jenis ?></td>
                    <td><?= number_format($row->jumlah) ?></td>
                    <td><?= rp($row->total) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>