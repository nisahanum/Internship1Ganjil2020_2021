<div class="page-header">
    <h1>Perhitungan Testing</h1>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#c1" data-toggle="collapse">Perhitungan</a>
        </h3>
    </div>
    <div class="panel-body collapse" id="c1">
        <pre>
        <?php
        $data = get_dataset();
        $c50 = new c50($data, $ATRIBUT, $TARGET, true);
        ?>
        </pre>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#c2" data-toggle="collapse">Tree</a>
        </h3>
    </div>
    <div class="panel-body collapse" id="c2">
        <pre>
        <?php
        $c50->display();
        ?>
        </pre>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a data-toggle="collapse" href="#hasil">Hasil</a></h3>
    </div>

    <?php
    $rows = $db->get_results("SELECT YEAR(tanggal) AS tahun, MONTH(tanggal) AS bulan, p.nama_perusahaan, j.nama_jenis, COUNT(*) AS jumlah, SUM(harga) AS total
        FROM tb_transaksi t INNER JOIN tb_perusahaan p ON p.id_perusahaan=t.id_perusahaan INNER JOIN tb_jenis j ON j.id_jenis=t.id_jenis        
        GROUP BY YEAR(tanggal), MONTH(tanggal), p.id_perusahaan, j.nama_jenis ORDER BY tanggal");

    $testing = array();
    $tahun = array();
    $no = 1;
    foreach ($rows as $row) {
        $tahun[$no] = $row->tahun;
        $testing[$no] = array(
            'Bulan' => $BULAN[$row->bulan],
            'Perusahaan' => $row->nama_perusahaan,
            'Jenis' => $row->nama_jenis,
            'Jumlah' => $row->jumlah,
            'Total' => $row->total,
        );
        $no++;
    }

    $fields = $testing;

    $testing = convert_testing($testing, array('Jumlah', 'Total'), get_data());


    ?>
    <div class="panel-body collapse in" id="hasil">
        <table class="table table-bordered table-hover table-striped datatable">
            <thead>

                <tr class="nw">
                    <th>Nomor</th>
                    <th>Tahun</th>
                    <?php foreach ($ATRIBUT as $key => $val) : ?>
                        <th><?= $val ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php
            $hasil = array();
            foreach ($testing as $key => $val) :
                $hasil[$key] = ucfirst($c50->predict($val));

                $fields[$key]['Tahun'] = $tahun[$key];
                $fields[$key]['Hasil'] = $hasil[$key];
            ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $tahun[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v ?></td>
                    <?php endforeach ?>
                    <td><code><?= $hasil[$key] ?></code></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="panel-footer">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cetak <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <?php foreach (array_count_values($hasil) as $key => $val) : ?>
                    <li><a href="cetak.php?m=hitung&hasil=<?= $key ?>" target="_blank"><?= $key ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
<?php

//echo '<pre>' . print_r($fields, 1) . '</pre>';

$db->query("TRUNCATE tb_hasil");
$db->multi_query('tb_hasil', $fields);

$grafik  = array_count_values($hasil);
$db->query("TRUNCATE tb_grafik");
foreach ($grafik as $key => $val) {
    $db->query("INSERT INTO tb_grafik (potensial, total) VALUES ('" . ucfirst($key) . "', '$val')");
}
