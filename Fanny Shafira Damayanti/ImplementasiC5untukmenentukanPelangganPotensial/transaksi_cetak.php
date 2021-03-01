<h1>Transaksi</h1>
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
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $pg = new Paging();
    $limit = 10;
    $offset = $pg->get_offset($limit, $_GET['page']);
    $from = "FROM tb_transaksi t LEFT JOIN tb_user u ON u.id_user=t.id_user LEFT JOIN tb_perusahaan p ON p.id_perusahaan=t.id_perusahaan LEFT JOIN tb_jenis j ON j.id_jenis=t.id_jenis";
    $where = " WHERE nama_user LIKE '%$q%' OR nama_perusahaan LIKE '%$q%' OR nama_jenis LIKE '%$q%'";
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
        </tr>
    <?php endforeach; ?>
</table>