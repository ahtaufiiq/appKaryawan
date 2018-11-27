<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h3>Data Karyawan</h3>

<a class="btn btn-success pull-right" href="<?= base_url('karyawan/tambah') ?>">tambah</a>
<table class="table table-striped">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Telpon</th>
        <th>Jabatan</th>
        <th>Jenis Kelamin</th>
        <th>Divisi</th>
        <th>Tanggal Lahir</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
    <?php
    foreach ($records as $idx => $row) {
        ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['telpon'] ?></td>
            <td><?= $row['jabatan'] ?></td>
            <td><?= $row['jeniskelamin'] ?></td>
            <td><?= $row['namadivisi'] ?></td>
            <td><?= $row['tgl_lahir'] ?></td>
            <td>
            <img width="100px" height="100px" src="<?= BASE_ASSETS.'/uploads/'.$row['foto']?>">
            </td>
        
            <td>
                <a class="btn btn-primary" href="<?= base_url('karyawan/detail') ?>/<?= $row['id'] ?>">detail</a>
                <a class="btn btn-warning" href="<?= base_url('karyawan/edit') ?>/<?= $row['id'] ?>">edit</a>
                <a onclick="return confirm('menghapus data?')" 
                   class="btn btn-danger" href="<?= base_url('karyawan/hapus') ?>/<?= $row['id'] ?>">hapus</a>
            </td>
        </tr>
        <?php
    }
    ?>

</table>