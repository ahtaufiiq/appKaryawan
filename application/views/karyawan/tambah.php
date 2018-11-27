<?php

include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h3>Tambah Karyawan</h3>
<?php echo validation_errors(); ?>
<form enctype="multipart/form-data"
action="<?= base_url('karyawan/tambah_save') ?>" 
    method="post">
    <div>
        <label>Nama:</label>
        <input type="text" name="nama" required/>
    </div>
     <div>
        <label>Email:</label>
        <input type="text" name="email" required/>
    </div>
    <div>
        <label>Telpon:</label>
        <input type="text" name="telpon" required/>
    </div>
    <div>
        <label>Jabatan:</label>
        <select name="jabatan" id="">
        <?php 
        foreach($jabatan as $key => $label){
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
        <input type="radio" name="jeniskelamin" value="L" checked/>L
        <input type="radio" name="jeniskelamin" value="P"/>P
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
        <input type="date" name="tgllahir" required/>
    </div>
    <div>
        <label>Foto:</label>
        <input type="file" name="foto" required/>
    </div>
    <div>
        <input type="submit" value="Simpan"/>
    </div>
</form>
