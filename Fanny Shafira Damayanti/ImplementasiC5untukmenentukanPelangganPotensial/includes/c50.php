<?php

function convert_dataset($dataset, $cols = array())
{
    $arr = array();
    foreach ($dataset as $key => $val) {
        foreach ($cols as $k) {
            $arr[$k][] = $val[$k];
        }
    }
    $arr2 = array();
    $count = count($dataset);
    $pembagi = $count / 4;

    foreach ($arr as $key => $val) {
        asort($val);
        $i = 1;
        foreach ($val as $k => $v) {
            $arr2[$key][ceil($i / $pembagi)][] = $v;
            $i++;
        }
    }
    $arr3 = array();
    foreach ($arr2 as $key => $val) {
        foreach ($val as $k => $v) {
            $arr3[$key][$k] = max($v);
        }
    }
    $arr4 = array();
    foreach ($dataset as $key => $val) {
        foreach ($cols as $k) {
            foreach ($arr3[$k] as $a => $b) {
                if ($val[$k] <= $b) {
                    $dataset[$key][$k] = '<=' . number_format($b, 0, ',', '.');
                    break 1;
                }
            }
        }
    }
    //echo '<pre>' . print_r($dataset, 1) . '</pre>';
    return $dataset;
}
function convert_testing($testing, $cols = array(), $dataset)
{
    $arr = array();
    foreach ($dataset as $key => $val) {
        foreach ($cols as $k) {
            $arr[$k][] = $val[$k];
        }
    }
    $arr2 = array();
    $count = count($dataset);
    $pembagi = $count / 4;

    foreach ($arr as $key => $val) {
        asort($val);
        $i = 1;
        foreach ($val as $k => $v) {
            $arr2[$key][ceil($i / $pembagi)][] = $v;
            $i++;
        }
    }
    $arr3 = array();
    foreach ($arr2 as $key => $val) {
        foreach ($val as $k => $v) {
            $arr3[$key][$k] = max($v);
        }
    }
    $arr4 = array();
    foreach ($testing as $key => $val) {
        foreach ($cols as $k) {
            foreach ($arr3[$k] as $a => $b) {
                if ($val[$k] <= $b) {
                    $testing[$key][$k] = '<=' . number_format($b);
                    break 1;
                }
            }
        }
    }
    //echo '<pre>' . print_r($dataset, 1) . '</pre>';
    return $testing;
}

function get_data()
{
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_dataset d LEFT JOIN tb_perusahaan p ON p.id_perusahaan=d.id_perusahaan LEFT JOIN tb_jenis j ON j.id_jenis=d.id_jenis ORDER BY id_dataset");
    $arr = array();
    foreach ($rows as $row) {
        $arr[$row->id_dataset] = array(
            'Bulan' => $row->bulan,
            'Perusahaan' => $row->nama_perusahaan,
            'Jenis' => $row->nama_jenis,
            'Jumlah' => $row->jumlah,
            'Total' => $row->total,
            'Potensial' => $row->potensial,
        );
    }
    //echo '<pre>' . print_r($arr, 1) . '</pre>';
    return $arr;
}

function get_dataset()
{
    $arr = get_data();
    $arr = convert_dataset($arr, array('Jumlah', 'Total'), $arr);
    //echo '<pre>' . print_r($arr, 1) . '</pre>';
    return $arr;
}

/**
 * Class C50
 * Melakukan proses pembentukan pohon keputusan berdasarkan dataset
 * Melakukan prediksi berdasarkan pohon keputusan yang dihasilkan
 */
class c50
{
    protected $data; //dataset
    protected $target; //atribut target
    protected $target_values; //label semua atribut target
    protected $atribut; //data atribut

    protected $tree; //pohon keputusan
    protected $atribut_values; //nilai dari masing-masing atribut

    protected $counter; //menghitung berapa total cabang yang sudah dicari
    protected $is_debug; //apakah ingin menampilkan proses perhitungan

    function __construct($data, $atribut, $target, $is_debug = false)
    {
        $this->data = $data;
        //menghapus atribut terakhir (target)
        array_pop($atribut);
        foreach ($atribut as $key => $val) {
            $this->atribut[$val] = $val;
        }
        $this->target = $target;
        //menghitung nilai yang ada untuk atribut target
        $this->target_values = $this->possible_values($data, $target);
        $this->is_debug = $is_debug;
        //memanggil fungsi hitung
        $this->hitung();
    }
    /**
     * menampilkan pohon keputusan
     */
    public function display()
    {
        echo "<ul class='c50_tree'><li><a href='javascript:void(0)' class='btn btn-xs btn-danger'>Root</a></li>";
        $this->_display($this->tree);
        echo "</ul>";
    }
    /**
     * fungsi recursif untuk menampilkan pohon keputusan
     * @param array $tree Pohon keputusan induk
     */
    public function _display($tree)
    {
        echo "<ul>";
        foreach ($tree['next'] as $key => $val) {
            echo "<li><a href='javascript:void(0)' class='btn btn-xs btn-primary'> IF <b>$tree[value]</b> Is <b>$key</b> THEN";
            if (!$val['next'])
                echo " <b>$val[value]</b>";
            echo "</a>";
            //jika masih ada anak, maka panggil _display lagi
            $this->_display($val);
            echo '</li>';
        }
        echo "</ul>";
    }
    /**
     * memprediksi hasil berdasarkan inputan user
     * @param array $values Inputan user
     */
    function predict($values)
    {
        return $this->_predict($this->tree, $values);
    }
    /**
     * fungsi rekursif memprediksi hasil berdasarkan inputan user
     * @param array $tree Pohon keputusan
     * @param array $values Inputan user
     */
    function _predict($tree, $values)
    {
        if (!$tree['next'])
            return $tree['value'];

        $value = $values[$tree['value']];

        if (isset($tree['next'][$value])) {
            //jika masih ada anak, maka panggil _predict lagi
            return $this->_predict($tree['next'][$value], $values);
        }

        // jika tidak ditemukan cabang sesuai inputan
          return 'Potensial';
    }
    /**
     * melakukan proses perhitungan untuk membuat pohon keputusan
     */
    function hitung()
    {
        $this->counter = 1;
        $this->_hitung($this->tree, $this->data, $this->atribut, 'Root');
    }
    /**
     * fungsi recursif melakukan proses perhitungan untuk membuat pohon keputusan
     * @param array $tree Pohon keputusan
     * @param array $data Dataset
     * @param array $atribut Atribut
     * @param string|null $attr_value Nilai atribut
     */
    function _hitung(&$tree, $data, $atribut, $attr_value = null)
    {
        $this->counter++;
        //jika perulangan lebih dari 10000 maka akan distop untuk mencegah error jika data terlalu kompleks
        if ($this->counter > 10000)
            return;

        //jumlah label
        $target_count = $this->possible_values($data, $this->target);


        if (count($target_count) == 1) { // jika hanya 1 kemungkinan, maka hasil sudah ditemukan
            $this->dd("\n===Hasil Cabang <b>$attr_value</b>:" . key($target_count) . "===");
            $tree['value'] = key($target_count);
            $tree['next'] = array();
            $this->dd("\n");
            return;
        } else { //jika lebih dari 1 lanjur ke bawah
            $this->dd("\n===Perhitungan Cabang <b>$attr_value</b>===");
        }
        //gain terbaik
        $best_gain = -1;
        //atribut terbaik
        $best_atribut = 'None';

        //jika atribut sudah habis, maka berhenti
        if (!$atribut) {
            arsort($target_count);
            $this->dd("\n===Hasil Cabang <b>$attr_value</b>:" . key($target_count) . "===");
            $tree['value'] = key($target_count);
            $tree['next'] = array();
            $this->dd("\n");
            return;
        }
        //lakukan perhitungan untuk semua atribut
        foreach ($atribut as $attr) {
            $this->dd("\n<span class='text-primary'>$attr</span>:");
            //menghitung gain 
            $gain = $this->gain($data, $attr);
            //menghitung split_info
            $split_info = $this->split_info($data, $attr);
            //mengitung gain ratio
            $gain_ratio = $split_info == 0 ? $gain : $gain / $split_info;
            $this->dd("\n\t<b class='text-info'>GAIN</b>: " . round($gain, 3) . "");
            $this->dd("\n\t<b class='text-info'>SPLIT INFO</b>: " . round($split_info, 3) . "");
            $this->dd("\n\t<b class='text-info'>GAIN RATIO</b>: " . round($gain_ratio, 3) . "");

            //memilih gain dan atribut terbaik
            if ($gain_ratio > $best_gain) {
                $best_gain = $gain_ratio;
                $best_atribut = $attr;
            }
        }
        //menampilkan atribut terbaik (gain terbesar)
        $this->dd("\n<b class='text-success'>Atribut terbaik</b>: $best_atribut (" . round($best_gain, 3) . ")");

        //menghitung nilai untuk atribut terbaik
        $p = $this->possible_values($data, $best_atribut);
        //menghapus atribut terbaik agar tidak dihitung lagi
        unset($atribut[$best_atribut]);

        $this->dd("\n");

        foreach ($p as $val => $count) {
            //memfilter data dengan cara menghilangkan data yang berisi atribut terbaik
            $new_data = $this->filter_data($data, $best_atribut, $val);
            $tree['value'] = $best_atribut;
            //menghitung lagi untuk semua nilai atribut terbaik
            $this->_hitung($tree['next'][$val], $new_data, $atribut, "$best_atribut($val)");
        }
    }
    /**
     * memfilter data dengan menghilangkan nilai atribut terbaik
     * @param array $data Dataset
     * @param string $best_attr Nama atribut terbaik
     * @param string $value nilai atribut terbaik
     */
    function filter_data($data, $best_attr, $value)
    {
        $arr = array();
        foreach ($data as $val) {
            if ($val[$best_attr] == $value) {
                unset($val[$best_attr]);
                $arr[] = $val;
            }
        }
        return $arr;
    }
    /**
     * menghitung split info
     * @param array $data Dataset
     * @param string $attr Atribut
     */
    function split_info($data, $attr)
    {
        $values = $this->possible_values($data, $attr);
        $split_info = 0.0;
        $pembagi = array_sum($values);
        foreach ($values as $value => $count) {
            $split_info += $count == 0 ? 0 : $count / $pembagi * log($count / $pembagi, 2);
        }
        return -$split_info;
    }
    /**
     * menghitung nilai gain
     * @param array $data Dataset
     * @param string $attr Atribut
     */
    function gain($data, $attr)
    {
        $values = $this->possible_values($data, $attr);
        $total = count($data);
        $gain = 0.0;
        foreach ($values as $value => $count) {
            $e = $this->entropy($data, $attr, $value);
            $this->dd("\n\t<span class='text-danger'>$value</span>($count/$total): " . round($e, 3));
            $gain += $e * $count / $total;
        }
        $e = $this->entropy($data);
        return $e - $gain;
    }
    /**
     * menghitung nilai entropy
     * @param array $data Dataset
     * @param string|null $attr Nama atribut
     * @param string|null $vakue Nilai atribut
     */
    function entropy($data, $attr = null, $value = null)
    {
        $p = $this->calculate_p($data, $attr, $value);
        $entropy = 0.0;
        foreach ($p as $key => $val) {
            $entropy -= $val == 0 ? 0 : $val * log($val, 2);
        }
        return $entropy;
    }
    /**
     * menghitung nilai probabilitas (p)
     * @param array $data Dataset
     * @param string|null $attr Nama atribut
     * @param string|null $vakue Nilai atribut
     */
    function calculate_p($data, $attr, $attr_value)
    {
        $p = array();

        foreach ($this->target_values as $key => $val) {
            $p[$key] = 0;
        }
        foreach ($data as $val) {
            if ($attr == null) {
                $p[$val[$this->target]]++;
            } else if ($val[$attr] ==  $attr_value) {
                $p[$val[$this->target]]++;
            }
        }
        $p_total = array_sum($p);
        foreach ($p as $key => &$val) {
            $val /= $p_total;
        }
        return $p;
    }
    /**
     * menghitung pilihan nilai yang ada untuk atribut tertentu
     * @param array $data Dataset
     * @param string|null $attr Nama atribut
     */
    function possible_values($data, $attr)
    {
        $arr = array();
        foreach ($data as $val) {
            $arr[$val[$attr]] = array_key_exists($val[$attr], $arr) ? $arr[$val[$attr]] + 1 : 1;
        }
        return $arr;
    }
    /**
     * menampilkan proses perhitungan jika is_debug bernilai true
     * @param string $str teks yang ditampilkan
     */
    function dd($str)
    {
        if ($this->is_debug)
            echo "$str";
    }
}
