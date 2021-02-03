<div class="page-header">
    <h1>Konsultasi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
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
                <label>Jumlah <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jumlah" value="<?= set_value('jumlah') ?>" />
            </div>
            <div class="form-group">
                <label>Total <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="total" value="<?= set_value('total') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-signal"></span> Hasil</button>
            </div>
        </form>
    </div>
</div>
<?php if ($_POST) include 'konsultasi_hasil.php' ?>