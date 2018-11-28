<?php

include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h3>Edit Karyawan</h3>
<?php echo validation_errors(); ?>
<form enctype="multipart/form-data" action="<?= base_url('karyawan/edit_save') ?>" method="post">
    <input type="hidden" name="id" value="<?= $karyawan['id']?>">

    <div>
        <label>Nama:</label>
        <input type="text" name="nama"  value="<?= $karyawan['nama']?>" required/>
    </div>
     <div>
        <label>Email:</label>
        <input type="text" name="email"  value="<?= $karyawan['email']?>" required/>
    </div>
    <div>
        <label>Telpon:</label>
        <input type="text" name="telpon"  value="<?= $karyawan['id']?>" required/>
    </div>
    <div>
        <label>Jabatan:</label>
        <select name="jabatan" id="">
        <?php 
        foreach($jabatan as $key => $label){
            $selected = "";
            if($key == $karyawan['jabatan'])
            {
                $selected = "selected";
            }    
        ?>
            <option value= "<?= $key ?>"><?= $label ?>
            </option>
        <?php
        }
        ?>
        
        </select>
    </div>
    <div>
        <label>Jenis Kelamin:</label>
        <?php
            $checkedL = "";
            $checkedP = "checked";
            
            if($karyawan['jeniskelamin'] == 'L')
            {
                $checkedL = "checked";
                $checkedP = "";
            }else{
                $checkedL = "";
                $checkedP = "checked";
            }
        ?>
        <input type="radio" name="jeniskelamin" value="L" checked/><?= $checkedL ?> L
        <input type="radio" name="jeniskelamin" value="P"/><?= $checkedP?> P
    </div>
    <div>
        <label>Divisi:</label>
        <select name="iddivisi">
        <?php 
        foreach($divisi as $row => $divisi){
            ?>
            <option value= "<?= $divisi['id'] ?>"><?= $divisi['nama'] ?>
            </option>
        <?php
        }
        ?>
        </select>
    </div>
    <div>
        <label>Tanggal Lahir:</label>
        <input type="date" value="<?=$karyawan['tgllahir']?>" name="tgllahir" required/>
    </div>
    <div>
        <label>Foto:</label>
        <input type="file" name="foto" required/>
        <img width="100px" height="100px" src="<?= BASE_ASSETS.'/uploads/'.$karyawan['foto']?>">
    </div>
    <div>
        <input type="submit" value="Simpan"/>
    </div>
</form>
