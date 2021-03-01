<div class="page-header">
    <h1>Akurasi</h1>
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
    $testing = $data;
    //echo '<pre>' . print_r($testing, 1) . '</pre>';
    ?>
    <div class="panel-body collapse" id="hasil">
        <table class="table table-bordered table-hover table-striped datatable">
            <thead>

                <tr class="nw">
                    <th>Nomor</th>
                    <?php foreach ($ATRIBUT as $key => $val) : ?>
                        <th><?= $val ?></th>
                    <?php endforeach ?>
                    <th>Prediksi</th>
                    <th>Benar?</th>
                </tr>
            </thead>
            <?php
            $hasil = array();
            $asli = array();
            foreach ($testing as $key => $val) :
                $hasil[$key] = $c50->predict($val);
                $asli[$key] = $val[$TARGET];
            ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v ?></td>
                    <?php endforeach ?>
                    <td><code><?= $hasil[$key] ?></code></td>
                    <td><?= $hasil[$key] == $asli[$key] ? '&check;' : '' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php
$arr = array();
/**
 * membuat confusion matrix sesuai label yang ada 
 * dengan mengisikan true positif, false positif, true negatif, false, negatif bernilai 0
 */
foreach (array_count_values($hasil) as $key => $val) {
    $arr[$key] = array(
        'TP' => 0,
        'FP' => 0,
        'TN' => 0,
        'FN' => 0,
    );
}

foreach ($hasil as $key => $val) {
    $actual = $asli[$key];
    foreach ($arr as $k => $v) {
        //prediksi positif
        if ($k == $val) {
            if ($k == $actual)
                $arr[$k]['TP']++; //true positif jika prediksi positif dan aktual positif
            else
                $arr[$k]['FP']++; //false positif jika prediksi positif dan aktual negatif
        }
        //prediksi negatif
        else {
            if ($k == $actual)
                $arr[$k]['FN']++; //false negatif jika prediksi negatif dan aktual positif
            else
                $arr[$k]['TN']++; //true negatif jika prediksi negatif dan aktual negatif
        }
    }
}

foreach ($arr as $key => $val) {
    $total = array_sum($val);
    //menghitung akurasi
    $arr[$key]['Accuracy'] = ($val['TP'] + $val['TN']) / $total;
    //menghitung precision
    $arr[$key]['Precision'] = $val['TP'] / ($val['TP'] + $val['FP']);
    //menghitung recall
    $arr[$key]['Recall'] = $val['TP'] / ($val['TP'] + $val['FN']);
}

?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#C7" data-toggle="collapse">Confusion Matrix</a></h3>
    </div>
    <div class="table-responsive collapse in" id="C7">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Klasifikasi</th>
                    <th>TP</th>
                    <th>FP</th>
                    <th>TN</th>
                    <th>FN</th>
                    <th>Accuracy</th>
                    <th>Precision</th>
                    <th>Recall</th>
                </tr>
            </thead>
            <?php foreach ($arr as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>