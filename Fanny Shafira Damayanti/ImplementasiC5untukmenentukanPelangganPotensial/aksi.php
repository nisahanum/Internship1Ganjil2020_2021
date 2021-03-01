<?php
require_once 'functions.php';

/** LOGIN */
if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['id'] = $row->id_user;
        $_SESSION['login'] = $row->user;
        $_SESSION['level'] = $row->level;
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login'], $_SESSION['level']);
    header("location:index.php");
} else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
}
/** dataset */
elseif ($mod == 'dataset_tambah') {
    $bulan = $_POST['bulan'];
    $id_perusahaan = $_POST['id_perusahaan'];
    $id_jenis = $_POST['id_jenis'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];
    $potensial = $_POST['potensial'];

    if ($bulan == '' || $id_perusahaan == '' || $id_jenis == '' || $jumlah == '' || $total == '' || $potensial == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_dataset (bulan, id_perusahaan, id_jenis, jumlah, total, potensial) VALUES ('$bulan', '$id_perusahaan', '$id_jenis', '$jumlah', '$total', '$potensial')");
        redirect_js("index.php?m=dataset");
    }
} else if ($mod == 'dataset_ubah') {
    $bulan = $_POST['bulan'];
    $id_perusahaan = $_POST['id_perusahaan'];
    $id_jenis = $_POST['id_jenis'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];
    $potensial = $_POST['potensial'];

    if ($bulan == '' || $id_perusahaan == '' || $id_jenis == '' || $jumlah == '' || $total == '' || $potensial == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_dataset SET bulan='$bulan', id_perusahaan='$id_perusahaan', id_jenis='$id_jenis', jumlah='$jumlah', total='$total', potensial='$potensial' WHERE id_dataset='$_GET[ID]'");
        redirect_js("index.php?m=dataset");
    }
} else if ($act == 'dataset_hapus') {
    $db->query("DELETE FROM tb_dataset WHERE id_dataset='$_GET[ID]'");
    header("location:index.php?m=dataset");
}
/** perusahaan */
elseif ($mod == 'perusahaan_tambah') {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];

    if ($nama_perusahaan == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_row("SELECT * FROM tb_perusahaan WHERE nama_perusahaan='$nama_perusahaan' AND alamat_perusahaan='$alamat_perusahaan'"))
        print_msg("Perusahaan dengan nama dan alamat sama sudah ada!");
    else {
        $db->query("INSERT INTO tb_perusahaan (nama_perusahaan, alamat_perusahaan) VALUES ('$nama_perusahaan', '$alamat_perusahaan')");
        redirect_js("index.php?m=perusahaan");
    }
} else if ($mod == 'perusahaan_ubah') {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];

    if ($nama_perusahaan == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_perusahaan SET nama_perusahaan='$nama_perusahaan', alamat_perusahaan='$alamat_perusahaan' WHERE id_perusahaan='$_GET[ID]'");
        redirect_js("index.php?m=perusahaan");
    }
} else if ($act == 'perusahaan_hapus') {
    $db->query("DELETE FROM tb_perusahaan WHERE id_perusahaan='$_GET[ID]'");
    header("location:index.php?m=perusahaan");
}

/** jenis */
elseif ($mod == 'jenis_tambah') {
    $nama_jenis = $_POST['nama_jenis'];

    if ($nama_jenis == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_jenis (nama_jenis) VALUES ('$nama_jenis')");
        redirect_js("index.php?m=jenis");
    }
} else if ($mod == 'jenis_ubah') {
    $nama_jenis = $_POST['nama_jenis'];

    if ($nama_jenis == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_jenis SET nama_jenis='$nama_jenis' WHERE id_jenis='$_GET[ID]'");
        redirect_js("index.php?m=jenis");
    }
} else if ($act == 'jenis_hapus') {
    $db->query("DELETE FROM tb_jenis WHERE id_jenis='$_GET[ID]'");
    header("location:index.php?m=jenis");
}

/** transaksi */
elseif ($mod == 'transaksi_tambah') {
    $no_transaksi = $_POST['no_transaksi'];
    $id_user = $_POST['id_user'];
    $id_perusahaan = $_POST['id_perusahaan'];
    $id_jenis = $_POST['id_jenis'];
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];
    $alamat_kirim = $_POST['alamat_kirim'];

    if ($no_transaksi == '' || $id_user == '' || $id_perusahaan == '' || $id_jenis == '' || $tanggal == '' || $berat == '' || $harga == '' || $alamat_kirim == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_row("SELECT * FROM tb_transaksi WHERE no_transaksi='$no_transaksi'")) {
        print_msg('No transaksi sudah ada');
    } else {
        $db->query("INSERT INTO tb_transaksi (no_transaksi, id_user, id_perusahaan, id_jenis, tanggal, berat, harga, alamat_kirim) VALUES ('$no_transaksi', '$id_user', '$id_perusahaan', '$id_jenis', '$tanggal', '$berat', '$harga', '$alamat_kirim')");
        redirect_js("index.php?m=transaksi");
    }
} else if ($mod == 'transaksi_ubah') {
    $id_user = $_POST['id_user'];
    $id_perusahaan = $_POST['id_perusahaan'];
    $id_jenis = $_POST['id_jenis'];
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];
    $alamat_kirim = $_POST['alamat_kirim'];

    if ($id_user == '' || $id_perusahaan == '' || $id_jenis == '' || $tanggal == '' || $berat == '' || $harga == '' || $alamat_kirim == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_transaksi SET id_user='$id_user', id_perusahaan='$id_perusahaan', id_jenis='$id_jenis', tanggal='$tanggal', berat='$berat', harga='$harga', alamat_kirim='$alamat_kirim' WHERE no_transaksi='$_GET[ID]'");
        redirect_js("index.php?m=transaksi");
    }
} else if ($act == 'transaksi_hapus') {
    $db->query("DELETE FROM tb_transaksi WHERE no_transaksi='$_GET[ID]'");
    header("location:index.php?m=transaksi");
}




















/** user */
elseif ($mod == 'user_tambah') {
    $nama_user = $_POST['nama_user'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    if ($nama_user == '' || $user == '' || $pass == '' || $level == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_user WHERE user='$user'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_user (nama_user, user, pass, level) 
            VALUES ('$nama_user', '$user', '$pass', '$level')");
        redirect_js("index.php?m=user");
    }
} else if ($mod == 'user_ubah') {
    $nama_user = $_POST['nama_user'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    if ($nama_user == '' || $user == '' || $pass == '' || $level == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_user WHERE user='$user' AND id_user<>'$_GET[ID]'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("UPDATE tb_user SET nama_user='$nama_user', user='$user', pass='$pass', level='$level' WHERE id_user='$_GET[ID]'");
        redirect_js("index.php?m=user");
    }
} else if ($act == 'user_hapus') {
    $db->query("DELETE FROM tb_user WHERE id_user='$_GET[ID]'");
    header("location:index.php?m=user");
}


















/** RELASI JENIS */
else if ($mod == 'rel_jenis') {
    $ID1 = $_POST['ID1'];
    $ID2 = $_POST['ID2'];
    $nilai = abs($_POST['nilai']);

    if ($ID1 == $ID2 && $nilai <> 1)
        print_msg("Makam yang sama harus bernilai 1.");
    else {
        $db->query("UPDATE tb_rel_jenis SET nilai=$nilai WHERE ID1='$ID1' AND ID2='$ID2'");
        $db->query("UPDATE tb_rel_jenis SET nilai=1/$nilai WHERE ID2='$ID1' AND ID1='$ID2'");
        print_msg("Nilai jenis berhasil diubah.", 'success');
    }
}

/** RELASI ALTERNATIF */
else if ($act == 'rel_dataset_ubah') {
    foreach ($_POST as $key => $value) {
        $ID = str_replace('ID-', '', $key);
        $db->query("UPDATE tb_rel_dataset SET nilai='$value' WHERE ID='$ID'");
    }
    header("location:index.php?m=rel_dataset");
}
