<?php
    $row = $db->get_row("SELECT * FROM tb_user WHERE id_user='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah User</h1>
</div>
<form method="post">
    <div class="row">
        <div class="col-sm-6">               
            <?php if($_POST) include'aksi.php'?> 
            <div class="form-group">
                <label>Nama User <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_user" value="<?=set_value('nama_user', $row->nama_user)?>"/>
            </div>
            <div class="form-group">
                <label>User <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?=set_value('user', $row->user)?>"/>
            </div>       
            <div class="form-group">
                <label>Pass <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass" value="<?=set_value('pass', $row->pass)?>"/>
            </div>      
            <div class="form-group">
                <label>Level <span class="text-danger">*</span></label>
                <?=get_level_radio(set_value('level', $row->level))?>
            </div> 
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=user"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div> 
        </div>
    </div>
</form>