<div class="page-header">
    <h1>Import Dataset</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <form method="post" enctype="multipart/form-data">
            <?php
            if ($_POST) {

                $row = 0;
                move_uploaded_file($_FILES['data']['tmp_name'], 'import/' . $_FILES['data']['name']) or die('Upload gagal');

                $arr = array();
                $keys = array();

                if (($handle = fopen('import/' . $_FILES['data']['name'], "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);

                        if ($row > 0) {
                            for ($c = 1; $c < $num; $c++) {
                                $arr[$row][$keys[$c]] = str_replace('\N', '', $data[$c]);
                            }
                        } else {
                            for ($c = 1; $c < $num; $c++) {
                                $keys[$c] = $data[$c];
                            }
                        }
                        $row++;
                    }
                    fclose($handle);
                }

                function to_date($str)
                {
                    $date = date_create($str, timezone_open("Europe/Oslo"));
                    return date_format($date, "Y-m-d");
                }

                $fields = array();
                foreach ($arr as $key => $val) {
                    $fields[$key]['bulan'] = $val['bulan'];
                    $fields[$key]['id_perusahaan'] = $PERUSAHAAN_IDS[strtolower(trim($val['perusahaan']))];
                    $fields[$key]['id_jenis'] = $JENIS_IDS[strtolower(trim($val['jenis']))];
                    $fields[$key]['jumlah'] = $val['jumlah'];
                    $fields[$key]['total'] = $val['total'];
                    $fields[$key]['potensial'] = $val['potensial'];
                }
                // echo '<pre>' . print_r($fields, 1) . '</pre>';
                $db->query('TRUNCATE tb_dataset');
                $db->multi_query('tb_dataset', $fields);
                print_msg('Dataset berhasil diimport!', 'success');
            }
            ?>
            <div class="form-group">
                <label>Pilih file</label>
                <input class="form-control" type="file" name="data" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="import"><span class="glyphicon glyphicon-import"></span> Import</button>
                <a class="btn btn-danger" href="?m=dataset"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>