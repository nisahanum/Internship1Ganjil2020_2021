<div class="page-header">
    <h1>Dataset</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="dataset" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group <?= is_hidden('aksi') ?>">
                <a class="btn btn-primary" href="?m=dataset_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group <?= is_hidden('aksi') ?>">
                <a class="btn btn-info" href="?m=dataset_import"><span class="glyphicon glyphicon-import"></span> Import</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Perusahaan</th>
                    <th>Jenis</th>
                    <th>Jumlah Transaksi</th>
                    <th>Total Uang</th>
                    <th>Potensial</th>
                    <th class="<?= is_hidden('aksi') ?>">Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $pg = new Paging();
            $limit = 25;
            $offset = $pg->get_offset($limit, $_GET['page']);
            $from = "FROM tb_dataset d LEFT JOIN tb_perusahaan p ON p.id_perusahaan=d.id_perusahaan LEFT JOIN tb_jenis j ON j.id_jenis=d.id_jenis";
            $where = " WHERE bulan LIKE '%$q%' OR nama_perusahaan LIKE '%$q%' OR nama_jenis LIKE '%$q%' OR potensial LIKE '%$q%'";
            $rows = $db->get_results("SELECT * $from $where ORDER BY id_dataset LIMIT $offset, $limit");
            $jumrec = $db->get_var("SELECT COUNT(*) $from $where");
            $no = $offset;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->bulan ?></td>
                    <td><?= $row->nama_perusahaan ?></td>
                    <td><?= $row->nama_jenis ?></td>
                    <td><?= number_format($row->jumlah) ?></td>
                    <td><?= rp($row->total) ?></td>
                    <td><?= $row->potensial ?></td>
                    <td class="<?= is_hidden('aksi') ?> nw">
                        <a class="btn btn-xs btn-warning" href="?m=dataset_ubah&ID=<?= $row->id_dataset ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=dataset_hapus&ID=<?= $row->id_dataset ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="panel-footer clearfix">
        <?= $pg->show("m=dataset&q=$_GET[q]&page=", $jumrec, $limit, $_GET['page']) ?>
    </div>
</div>