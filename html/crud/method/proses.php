<?
if(isset($_REQUEST['enter'])){
require "../database/koneksi.php";
koneksi("localhost","root","");
database("crud");
$tgl=date('y/m/d H:i:s');
$nama=$_REQUEST['nama'];
$email=$_REQUEST['email'];
$telp=$_REQUEST['telp'];
$alamat=nl2br($_REQUEST['alamat']);
if((!empty($nama))&&(!empty($email))&&(!empty($telp))&&(!empty($alamat))){
$query_data=mysql_query("insert into data values(null,'$tgl','$nama','$email','$telp','$alamat')");
if(!$query_data):
die('gagal mengirim data ke database mysql:'.mysql_error());
elseif($query_data):
?>
<script language="javascript">alert('data berhasil kami terima');document.location='../';</script>
<?endif;}else
{
	header('location:../index.php?halaman=error');
}
}
?>