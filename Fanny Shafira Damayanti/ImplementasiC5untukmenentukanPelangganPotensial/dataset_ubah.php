<?php
$row = $db->get_row("SELECT * FROM tb_dataset WHERE id_dataset='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Dataset</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Bulan <span class="text-danger">*</span></label>
                <select class="form-control" name="bulan">
                    <?= get_bulan_option(set_value('bulan', $row->bulan)) ?>
                </select>
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
                <label>Jumlah Transaksi<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jumlah" value="<?= set_value('jumlah', $row->jumlah) ?>" />
            </div>
            <div class="form-group">
                <label>Total Uang<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="total" value="<?= set_value('total', $row->total) ?>" />
            </div>
            <div class="form-group">
                <label>Potensial <span class="text-danger">*</span></label>
                <select class="form-control" name="potensial">
                    <?= get_potensial_option(set_value('potensial', $row->potensial)) ?>
                </select>
            </div>
            <div class="page-header">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=dataset"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>