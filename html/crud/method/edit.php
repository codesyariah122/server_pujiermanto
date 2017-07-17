<?
require '../database/koneksi.php';
koneksi("localhost","root","");
database("crud");
$update_result=mysql_query("select * from data where id='$_GET[id]'");
$result_array_data=mysql_fetch_array($update_result);
$id=mysql_real_escape_string($result_array_data['id']);
$tgl=mysql_real_escape_string($result_array_data['tgl']);
$nama=mysql_real_escape_string($result_array_data['nama']);
$email=mysql_real_escape_string($result_array_data['email']);
$telp=$result_array_data['telp'];
$alamat=$result_array_data['alamat'];
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head><title>Edit Data Crud</title></head>
<body>
<fieldset><legend><h2>Isi Form Untuk Edit Data</h2></legend>

<?require 'form_input.php';?>
<?form_buka("proses_edit.php","post");?><br/>
<?input_edit("hidden","id","num","$id","no");?><br/>
<?label_buka("nm","Nama Lengkap");?>&nbsp;
<?input_edit("text","nama","nm","$nama","no");?><br/>
<?label_buka("email","Email Address");?>&nbsp;
<?input_edit("email","email","email","$email","no");?><br/>
<?label_buka("no_telp","No.Telpon");?>&nbsp;
<?input_edit("text","telp","no_telp","$telp","disabled");?><br/>
<?label_buka("address","Alamat Lengkap");?>&nbsp;
<?input_edit("textarea","alamat","address","$alamat","no");?><br/><br/>
<?input_edit("submit","edit","enter","EDIT DATA","no");?>&nbsp;
<?form_tutup("tutup");?>
</fieldset>