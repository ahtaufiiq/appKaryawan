<?php 
    include APPPATH."views/fragment/header.php";
?>

<?php 
    include APPPATH."views/fragment/menu.php";
?>

<h3>Edit Divisi</h3>
<?php echo validation_errors();?>
<form action="<?= base_url('divisi/edit_save')?>" method="POST">
<input type="hidden" name="id" value="<?= $divisi['id']?>">
    <div>
        <label>Kode :</label>
        <input type="text" value="<?= $divisi['kode']?>" name="kode" required>
    </div>
    <div>
        <label>Nama :</label>
        <input type="text" name="nama" value="<?= $divisi['kode']?>" required>
    </div>
    <div>
        <input type="submit" value="Simpan">
    </div>
</form>

<?php 
    include APPPATH."views/fragment/footer.php";
?>
