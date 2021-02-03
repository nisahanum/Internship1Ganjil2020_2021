<?php
error_reporting(~E_NOTICE);
session_start();
include 'config.php';
include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include 'includes/paging.php';
include 'includes/c50.php';
include 'includes/SimpleImage.php';

$mod = $_GET['m'];
$act = $_GET['act'];

$ATRIBUT = array('Bulan', 'Perusahaan', 'Jenis', 'Jumlah', 'Total', 'Potensial');
$TARGET = 'Potensial';

$BULAN = array(
    1 => 'januari',
    2 => 'februari',
    3 => 'maret',
    4 => 'april',
    5 => 'mei',
    6 => 'juni',
    7 => 'juli',
    8 => 'agustus',
    9 => 'september',
    10 => 'oktober',
    11 => 'november',
    12 => 'desember',
);

$rows = $db->get_results("SELECT * FROM tb_jenis ORDER BY id_jenis");
$JENIS = array();
foreach ($rows as $row) {
    $JENIS[$row->id_jenis] = $row;
    $JENIS_IDS[strtolower(trim($row->nama_jenis))] = $row->id_jenis;
}

$rows = $db->get_results("SELECT * FROM tb_perusahaan ORDER BY id_perusahaan");
$PERUSAHAAN = array();
foreach ($rows as $row) {
    $PERUSAHAAN[$row->id_perusahaan] = $row;
    $PERUSAHAAN_IDS[strtolower(trim($row->nama_perusahaan))] = $row->id_perusahaan;
}
$rows = $db->get_results("SELECT * FROM tb_jenis ORDER BY id_jenis");
foreach ($rows as $row) {
    $JENIS[$row->id_jenis] = $row;
}


function format_date($datetime, $format = 'd M Y')
{
    $date = date_create($datetime);
    return date_format($date, $format);
}
//mengatur hak akses dari admin dan user
function is_able($mod)
{
    $role = array(
        'admin' => array(
            'perusahaan',
            'jenis',
            'transaksi',
            'c50',
            'dataset',
            'testing',
            'akurasi',
            'konsultasi',
            'hitung',
            'laporan',
            'password',
            'logout',
            'aksi',
        ),
        'user' => array(
            'perusahaan',
            'jenis',
            'transaksi',
            // 'c50',
            // 'dataset',
            // 'akurasi',
            // 'konsultasi',
            // 'perhitungan',
            'laporan',
            'password',
            'logout',
            'aksi',
        ),
    );
    $level = strtolower($_SESSION['level']);
    if (!$level) {
        $_SESSION['level'] = 'guest';
        $level = 'guest';
    }
    //var_dump($level);
    return in_array($mod, (array)$role[$level]);
}
function is_hidden($mod)
{
    return (is_able($mod)) ? '' : 'hidden';
}
function rp($number, $decimals = 0, $dec_point = '.', $thausand_sep = ',')
{
    return 'Rp ' . number_format($number, $decimals = 0, $dec_point = '.', $thausand_sep = ',');
}
function parse_file_name($file_name)
{
    $x = strtolower($file_name);
    $x = str_replace(array(' '), '-', $x);
    return $x;
}
/**
 * Menampilkan value dari variabel POST atau GET
 * @param string $key nama field atau variabel
 * @param string $default data asli jika null
 * @return string Isi variabel POST atau get
 */
function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}
/**
 * Escape karakter khusus dalam field SQL
 * @param string $str Isi field
 * @param string Field yang sudah diescape
 */
function esc_field($str)
{
    return addslashes($str);
}
/**
 * Mengarahkan ke halaman lain dengan java script
 * @param string $url Alamat yang akan dituju  
 */
function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}
/**
 * Menampilkan pesan dengan dialog javascript
 * @param string $msg Pesan yang ditamilkan
 */
function alert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '");</script>';
}
/**
 * Menampilkan pesan dan info
 * @param string $msg Pesan/Infor yang ditampilkan
 * @param string $type Jenis pesan 
 */
function print_msg($msg, $type = 'danger')
{
    echo ('<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>');
}

function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . ((int)substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function set_msg($msg, $type = 'success')
{
    $_SESSION['message'] = array('msg' => $msg, 'type' => $type);
}

function show_msg()
{
    if ($_SESSION['message'])
        print_msg($_SESSION['message']['msg'], $_SESSION['message']['type']);
    unset($_SESSION['message']);
}

function get_level_radio($selected)
{
    $arr = array('admin' => 'Admin', 'user' => 'Operator');
    $a = '';
    foreach ($arr as $key => $val) {
        if ($key == $selected)
            $a .= "<label class='radio-inline'>
                  <input type='radio' name='level' value='$key' checked> $val
                </label>";
        else
            $a .= "<label class='radio-inline'>
                  <input type='radio' name='level' value='$key'> $val
                </label>";
    }
    return '<div class="radio">' . $a . '</div>';
}

function get_perusahaan_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT id_perusahaan, nama_perusahaan FROM tb_perusahaan ORDER BY id_perusahaan");
    $a = '';
    foreach ($rows as $row) {
        if ($row->id_perusahaan == $selected)
            $a .= "<option value='$row->id_perusahaan' selected>$row->nama_perusahaan</option>";
        else
            $a .= "<option value='$row->id_perusahaan'>$row->nama_perusahaan</option>";
    }
    return $a;
}
function get_bulan_option($selected = '')
{
    global $BULAN;
    $a = '';
    foreach ($BULAN as $val) {
        if ($selected == $val)
            $a .= "<option value='$val' selected>" . ucfirst($val) . "</option>";
        else
            $a .= "<option value='$val'>" . ucfirst($val) . "</option>";
    }
    return $a;
}

function get_jenis_option($selected)
{
    global $JENIS;
    $a = '';
    foreach ($JENIS as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val->nama_jenis</option>";
        else
            $a .= "<option value='$key'>$val->nama_jenis</option>";
    }
    return $a;
}

function get_potensial_option($selected)
{
    $arr = array(
        'Potensial' => 'Potensial',
        'Tidak' => 'Tidak'
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}
