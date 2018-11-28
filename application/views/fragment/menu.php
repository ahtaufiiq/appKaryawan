<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  
    <ul class="navbar-nav">
      
    <?php
  if($this->ion_auth->is_admin()){
    $user=$this->ion_auth->user()->row();
  ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url()?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/divisi')?>">Divisi</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/divisi/tambah')?>">Tambah</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/karyawan')?>">Karyawan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logout')?>">Logout(<?= $user->first_name ?>)</a>
      </li>
      <?php
  }else{
      ?>
          <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/login')?>">Login</a>
      </li>

      <?php
  }
      ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/welcome/cari')?>">Pencarian</a>
      </li>
    </ul>
  </div>
</nav>