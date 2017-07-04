<?php
if(isset($_POST['buat_db'])){
$nama_db=$_POST['nama_db'];

if(!empty($nama_db)){
$connect=mysql_connect("localhost","root","1");
if(!$connect){
die('database gagal connect:'.mysql_error());
}else{
?>
<script language="javascript">alert('berhasil connect ke database');</script>

<?php }
$buat_db=mysql_query("create database $nama_db");
if(!$buat_db){
die('gagal membuat database $nama_db:'.mysql_error());
}else{
?>
<script language="javascript">alert('database berhasil dibuat');</script>
<?php }
}else
header('location:buat_db.php?id=0');
}
?>
<html><head><title>Buat_db</title></head>
<body>
<?php
if(isset($_GET['id'])){
if($_GET['id']=='0'){
?>
<script language="javascript">alert('maaf data masih kosong mohon isi form nya');document.location="buat_db.php?n=home";</script>
<?php }}?>
<fieldset><legend>
<h1>Silahkan isi form untuk membuat database</h1></legend>
<form action="" method="post">
<label>Nama Database</label><br>
<input type="text" name="nama_db"><br>
<button type="submit" name="buat_db">Buat database</button><br>
</form>
</fieldset>
</body>
</html>