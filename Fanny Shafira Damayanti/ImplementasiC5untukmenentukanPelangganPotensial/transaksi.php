<div class="page-header">
    <h1>Transaksi</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="transaksi" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group <?= is_hidden('aksi') ?>">
                <a class="btn btn-primary" href="?m=transaksi_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=transaksi" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>User</th>
                    <th>Perusahaan</th>
                    <th>Jenis</th>
                    <th>Tanggal</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Alamat Kirim</th>
                    <th class="<?= is_hidden('aksi') ?>">Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $pg = new Paging();
            $limit = 10;
            $offset = $pg->get_offset($limit, $_GET['page']);
            $from = "FROM tb_transaksi t LEFT JOIN tb_user u ON u.id_user=t.id_user LEFT JOIN tb_perusahaan p ON p.id_perusahaan=t.id_perusahaan LEFT JOIN tb_jenis j ON j.id_jenis=t.id_jenis";
            $where = " WHERE nama_user LIKE '%$q%' OR nama_perusahaan LIKE '%$q%' OR nama_jenis LIKE '%$q%' OR tanggal LIKE '%$q%' OR alamat_kirim LIKE '%$q%' OR berat LIKE '%$q%' OR harga LIKE '%$q%'" ;
            $rows = $db->get_results("SELECT * $from $where ORDER BY tanggal DESC, no_transaksi DESC LIMIT $offset, $limit");
            $jumrec = $db->get_var("SELECT COUNT(*) $from $where");
            $no = $offset;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->no_transaksi ?></td>
                    <td><?= $row->nama_user ?></td>
                    <td><?= $row->nama_perusahaan ?></td>
                    <td><?= $row->nama_jenis ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td><?= $row->berat ?></td>
                    <td><?= rp($row->harga) ?></td>
                    <td><?= $row->alamat_kirim ?></td>
                    <td class="<?= is_hidden('aksi') ?> nw">
                        <a class="btn btn-xs btn-warning" href="?m=transaksi_ubah&ID=<?= $row->no_transaksi ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=transaksi_hapus&ID=<?= $row->no_transaksi ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="panel-footer">
        <ul class="pagination"><?= $pg->show("m=transaksi&q=$_GET[q]&page=", $jumrec, $limit, $_GET['page']) ?></ul>
    </div>
</div>