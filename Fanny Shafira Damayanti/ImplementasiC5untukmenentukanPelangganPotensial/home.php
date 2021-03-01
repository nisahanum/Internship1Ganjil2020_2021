<div class="page-header">
    <h1>SELAMAT DATANG DI SISTEM INFORMASI KORPORAT KANTOR POS CIMAHI</h1>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<?php

$arr = array();
$rows = $db->get_results("SELECT bulan, perusahaan, hasil, jumlah FROM tb_hasil");
$hasil = array();
foreach ($rows as $row) {
    $hasil[$row->hasil] = $row->hasil;
    $arr[$row->bulan][$row->perusahaan][$row->hasil] += $row->jumlah;
}
foreach ($arr as $key => $val) {
    foreach ($val as $k => $v) {
        foreach ($hasil as $a => $b) {
            $arr[$key][$k][$a] = $v[$a] * 1;
        }
        krsort($arr[$key][$k]);
    }
}
//echo '<pre>' . print_r($arr, 1) . '</pre>';
?>
<?php foreach ($arr as $key => $val) : ?>

    <?php
    $series = array();
    foreach ($val as $k => $v) {
        foreach ($v as $a => $b) {
            $series[$a]['name'] = $a;
            $series[$a]['data'][] = $b;
        }
    }
    $series = array_values($series);
    // echo '<pre>' . print_r($series, 1) . '</pre>';
    $categories = array_keys($val);
    ?>
    <div class="panel panel-default">
        <div id="container_<?= $key ?>"></div>
    </div>

    <script>
        Highcharts.chart('container_<?= $key ?>', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Hasil Perhitungan Bulan <?= ucfirst($key) ?>'
            },
            xAxis: {
                categories: <?= json_encode($categories) ?>,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} data</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: <?= json_encode($series) ?>
        });
    </script>
<?php endforeach ?>