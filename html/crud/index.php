<?require 'method/form_input.php';?>
<?// Puji Ermanto Create A simple crud PHP MYSQL ?>
<?
/*-------------------------------------------
					Kontak
---------------------------------------------
Emali : pujiermanto@gmail.com,
phone : 0895345041053	
--------------------------------------------- */
?>		
<!DOCTYPE html>
<html lang="em">
<meta charset="utf-8">
<head><title>DATA CRUD</title></head>
<body>
<fieldset><legend><h2> WELCOME CRUD DATA </h2></legend>
<?form_buka("method/proses.php","post");?>

<?if(isset($_GET['halaman'])){
	if($_GET['halaman']=='error'){
		?>
		<script language="javascript">alert('Form Crud Data Harus Diisi, ulangi isi form CRUD DATA.');
		document.location='index.php?halaman=baru';</script>
<?}}?>

<?label_buka("nm","Nama Lengkap");?>&nbsp;
<?input_index("text","nama","nm");?><br/>
<?label_buka("email","Email Address");?>&nbsp;
<?input_index("email","email","email");?><br/>
<?label_buka("no_telp","No.Telpon");?>&nbsp;
<?input_index("number","telp","no_telp");?><br/>
<?label_buka("alamat","Alamat Lengkap");?>&nbsp;
<?input_index("textarea","alamat","alamat");?><br/><br/>
<?input_index("submit","enter","submit","KIRIM DATA");?>&nbsp;
<?input_index("reset","ulang","reset","CANCEL");?><br/>
<?form_tutup();?>
</fieldset>
<hr>
<fieldset><legend><h2>Table CRUD DATA</h2></legend>
<?table("buka",1);?>
<tr>
<?
$th=array("No","Tanggal input_index","Nama","Email","Telp","Alamat","Opsi");
for($X=0;$X<count($th);$X++){
	echo "<th>".$th[$X]."</th>"; 
}
?>
</tr>
<?
require "database/koneksi.php";
koneksi("localhost","root","");
database("crud");
$result_data=mysql_query("select * from data order by id ASC");
$no=1;
while($result_array=mysql_fetch_array($result_data)){
$tgl=$result_array['tgl'];
$nama=$result_array['nama'];
$email=$result_array['email'];
$telp=md5($result_array['telp']);
$alamat=$result_array['alamat'];
$equal_data=array($no,$tgl,$nama,$email,$telp,$alamat);
?>
<tr>
<?for($_X=0;$_X<count($equal_data);$_X++){?>
<td><?=$equal_data[$_X];?></td>
<?}?>
<td><a href="method/hapus.php?id=<?=$result_array['id'];?>"><button type="button" onclick='return.confirm("semua data di database akan terhapus")'>Hapus</button></a>&nbsp;
<a href="method/edit.php?id=<?=$result_array['id'];?>"><button type="button">edit</button></a></td>
</tr>
<?$no++;}?>
<?table("tutup");?>
</fieldset>
