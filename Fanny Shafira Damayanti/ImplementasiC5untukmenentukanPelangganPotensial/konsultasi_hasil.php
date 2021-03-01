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
        <h3 class="panel-title">
            <a href="#c3" data-toggle="collapse">Hasil</a>
        </h3>
    </div>
    <div class="panel-body collapse in" id="c3">
        <?php
        $arr = array(
            'Bulan' => $_POST['bulan'],
            'Perusahaan' => $PERUSAHAAN[$_POST['id_perusahaan']]->nama_perusahaan,
            'Jenis' => $JENIS[$_POST['id_jenis']]->nama_jenis,
            'Jumlah' => $_POST['jumlah'],
            'Total' => $_POST['total'],
        );
        $arr = convert_testing(array($arr), array('Jumlah', 'Total'), get_data());
        $str = array();
        foreach ($arr[0] as $key => $val) {
            $str[] = $key . ' <b>' . $val . '</b>';
        }
        $hasil = $c50->predict($arr[0]);
         //echo '<pre>' . print_r($arr, 1) . '</pre>';
        // echo '<pre>' . print_r($hasil, 1) . '</pre>';
        ?>
        <p>Berdasarkan perhitungan, jika <?= implode(', ', $str) ?> maka hasilnya <b><?= $hasil ?></b></p>
    </div>
</div>