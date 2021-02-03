<div class="page-header">
    <h1>Tambah Dataset</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Bulan <span class="text-danger">*</span></label>
                <select class="form-control" name="bulan">
                    <?= get_bulan_option(set_value('bulan')) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Perusahaan <span class="text-danger">*</span></label>
                <select class="form-control" name="id_perusahaan">
                    <?= get_perusahaan_option(set_value('id_perusahaan')) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jenis <span class="text-danger">*</span></label>
                <select class="form-control" name="id_jenis">
                    <?= get_jenis_option(set_value('id_jenis')) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah Transaksi<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jumlah" value="<?= set_value('jumlah') ?>" />
            </div>
            <div class="form-group">
                <label>Total Uang<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="total" value="<?= set_value('total') ?>" />
            </div>
            <div class="form-group">
                <label>Potensial <span class="text-danger">*</span></label>
                <select class="form-control" name="potensial">
                    <?= get_potensial_option(set_value('potensial')) ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=dataset"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>