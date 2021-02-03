<div class="page-header">
    <h1>Jenis</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="jenis" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group <?= is_hidden('aksi') ?>">
                <a class="btn btn-primary" href="?m=jenis_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis</th>
                    <th class="<?= is_hidden('aksi') ?>">Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $pg = new Paging();
            $limit = 10;
            $offset = $pg->get_offset($limit, $_GET['page']);
            $from = "FROM tb_jenis";
            $where = " WHERE nama_jenis LIKE '%$q%'";
            $rows = $db->get_results("SELECT * $from $where ORDER BY id_jenis LIMIT $offset, $limit");
            $jumrec = $db->get_var("SELECT COUNT(*) $from $where");
            $no = $offset;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->nama_jenis ?></td>
                    <td class="<?= is_hidden('aksi') ?> nw">
                        <a class="btn btn-xs btn-warning" href="?m=jenis_ubah&ID=<?= $row->id_jenis ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=jenis_hapus&ID=<?= $row->id_jenis ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="panel-footer clearfix">
        <?= $pg->show("m=jenis&q=$_GET[q]&page=", $jumrec, $limit, $_GET['page']) ?>
    </div>
</div>