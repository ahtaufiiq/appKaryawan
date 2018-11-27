<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h3>Login</h3>
<?php
if(isset($message)){
echo($message);
}
?>
<form action="<?= base_url('login/masuk')?>" method="post">

<div>
    <label>Username</label>
    <input type="text" name="username" />
</div>
<div>
    <label>Password</label>
    <input type="password" name="password" />
</div>
<div>
<input type="submit" value="Login"/>
</div>
</form>