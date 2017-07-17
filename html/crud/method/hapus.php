<?
require '../database/koneksi.php';
koneksi("localhost","root","");
database("crud");
$hapusdata=mysql_query("delete from data where id='$_GET[id]'");
if(!$hapusdata):
die('gagal menghapus database:'.mysql_error()); 
header('location:../index.php?home=page');
else:
?>
<script language="javascript">alert('data telah sukses dihapus');document.location='../index.php?home=personal_page_';</script>
<?
mysql_query("alter table data auto_increment=1");
endif;
?>