<?
require '../method/form_input.php';
if(isset($_REQUEST['enter'])){
$namadatabase=$_REQUEST['nama_db'];
if(!empty($namadatabase)):
require 'koneksi.php';
koneksi("localhost","root","");
$buat_db=mysql_query("create database $namadatabase");
if(!$buat_db):
die('gagal dalam membuat database:'.mysql_error());
else:
echo "<h1><font color='green'>Database Berhasil Dibuat</font></h1>";
endif;
else:
header('location:db.php?halaman=0');
endif;
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head><title>Form Database</title></head>
<body>
<?if(isset($_GET['halaman'])){
	if($_GET['halaman']=='0'){
		?>
		<script language="javascript">alert('form masih kosong, harap di isi');document.location='db.php?halaman=ada';</script>
<?}}?>
<fieldset><legend><h2>Form Pembuatan Database</h2></legend>
<?form_buka("","post");?><br/>
<?label_buka("nm_db","Nama Database");?>
<?label_tutup();?>&nbsp;
<?input_index("text","nama_db","nm_db");?><br/>
<?input_index("submit","enter","enter","BUAT DATABASE");?>&nbsp;
<?input_index("reset","ulangi","ulang","CANCEL BUAT");?><br/>
<?form_tutup();?>
</fieldset>

