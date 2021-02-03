<?php
$row = $db->get_row("SELECT * FROM tb_transaksi WHERE no_transaksi='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Transaksi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>No Transaksi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="no_transaksi" readonly value="<?= set_value('no_transaksi', $row->no_transaksi) ?>" />
            </div>
            <div class="form-group hidden">
                <label>User <span class="text-danger">*</span></label>
                <input class="form-control" type="text" readonly name="id_user" value="<?= $_SESSION['id'] ?>" />
            </div>
            <div class="form-group">
                <label>Perusahaan <span class="text-danger">*</span></label>
                <select class="form-control" name="id_perusahaan">
                    <?= get_perusahaan_option(set_value('id_perusahaan', $row->id_perusahaan)) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jenis <span class="text-danger">*</span></label>
                <select class="form-control" name="id_jenis">
                    <?= get_jenis_option(set_value('id_jenis', $row->id_jenis)) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal" value="<?= set_value('tanggal', $row->tanggal) ?>" />
            </div>
            <div class="form-group">
                <label>Berat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="berat" value="<?= set_value('berat', $row->berat) ?>" />
            </div>
            <div class="form-group">
                <label>Harga <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="harga" value="<?= set_value('harga', $row->harga) ?>" />
            </div>
            <div class="form-group">
                <label>Alamat Kirim <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="alamat_kirim" value="<?= set_value('alamat_kirim', $row->alamat_kirim) ?>" />
            </div>
            <div class="page-header">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=transaksi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>