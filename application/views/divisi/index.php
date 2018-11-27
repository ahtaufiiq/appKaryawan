<?php 
    include APPPATH."views/fragment/header.php";
?>

<?php 
    include APPPATH."views/fragment/menu.php";
?>

    <h1 class="text-center">Data Divisi</h1>
    <a href="<?= base_url('divisi/tambah')?>">
        <button class="btn btn-primary" style="margin-bottom: 12px;">
            Tambah
        </button>
    </a>
   
            <table border=1 class="table">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                <?php foreach($records as $record) : ?>
                    <td><?= $record['kode']?></td>
                    <td><?= $record['nama']?></td>
                    <td>
                        <a href="<?= base_url('divisi/detail')?>/<?=$record['id']?>"><button class="btn btn-success">Detail</button></a>
                        <a href="<?= base_url('divisi/edit')?>/<?=$record['id']?>"><button class="btn btn-warning">Edit</button></a>
                        <a href="<?= base_url('divisi/hapus')?>/<?=$record['id']?>"><button class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        
    <?php 
    include APPPATH."views/fragment/footer.php";
?>