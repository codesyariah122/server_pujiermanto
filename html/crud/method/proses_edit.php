<?
if(isset($_REQUEST['edit'])){
	require '../database/koneksi.php';
	koneksi("localhost","root","");
	database("crud");
	$tgl=date('y/m/d H:i:s');
	$nama=$_REQUEST['nama'];
	$email=$_REQUEST['email'];
	$alamat=$_REQUEST['alamat'];
	
	$update_result=mysql_query("update data set tgl='$tgl', nama='$nama', email='$email', alamat='$alamat' 
	where id='$_REQUEST[id]'");
	if(!$update_result):
	die('update data ke database gagal:'.mysql_error());
	else:
		?>
		<script language="javascript">alert("data telah di update, Selamat!");document.location="../";</script>
<?endif;}?>
