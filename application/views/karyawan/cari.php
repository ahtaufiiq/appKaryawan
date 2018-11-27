<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>

<h3>Data Karyawan</h3>
<form action="<?= base_url('welcome/cari_action')?>" method="post">
    <div>
    <input type="text" name="nama" placeholder="ketikan nama..."></div>
    <input type="submit" value="Cari">
</form>
<table class="table table-striped">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Telpon</th>
        <th>Jabatan</th>
        <th>Jenis Kelamin</th>
        <th>Divisi</th>
    </tr>
    <?php
    if(isset($records)){    
    foreach ($records as $idx => $row) {
        ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['telpon'] ?></td>
            <td><?= $row['jabatan'] ?></td>
            <td><?= $row['jeniskelamin'] ?></td>
            <td><?= $row['namadivisi'] ?></td>
        </tr>
        <?php
        }
    }
    ?>

</table>