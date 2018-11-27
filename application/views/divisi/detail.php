
<?php 
    include APPPATH."views/fragment/header.php";
?>

<?php 
    include APPPATH."views/fragment/menu.php";
?>

<h3 class="text-center">Detail Divisi</h3>
<div class="text-center">
<table border=1 class="table">
    <tr>
        <th>Kode</th>
        <td><?= $divisi['kode']?></td>
    </tr>

    <tr>
        <th>Nama</th>
        <td><?= $divisi['nama']?></td>
    </tr>
</table>
</div>
<?php 
    include APPPATH."views/fragment/footer.php";
?>