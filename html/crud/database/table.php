<?
require 'koneksi.php';
koneksi("localhost","root","");
database("crud");
$table=mysql_query("create table `data` (
`id` int(11) not null auto_increment,
`tgl` datetime not null,
`nama` varchar(50) not null,
`email` varchar(20) not null,
`telp` varchar(30) not null,
`alamat` longtext not null,
primary key(`id`))");

if(!$table):
die('gagal membuat table mysql:'.mysql_error());
else:
?>
<script language="javascript">
alert("table berhasil dibuat");
document.location="../";
</script>
<?endif;?>