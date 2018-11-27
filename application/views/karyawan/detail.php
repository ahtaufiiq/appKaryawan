
<?php 
    include APPPATH."views/fragment/header.php";
?>

<?php 
    include APPPATH."views/fragment/menu.php";
?>

<h3 class="text-center">Detail Karyawan</h3>
<div class="text-center">
<table border=1 class="table">
    <tr>
        <th>Nama</th>
        <td><?= $karyawan['nama']?></td>
    </tr>

    <tr>
        <th>Email</th>
        <td><?= $karyawan['email']?></td>
    </tr>
</table>
</div>
<?php 
    include APPPATH."views/fragment/footer.php";
?>