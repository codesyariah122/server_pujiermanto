<?php
include('koneksi_squid.php');

$table=mysql_query("create table `access_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(100) NOT NULL,
  `method` varchar(10) NOT NULL,
  `Stats` varchar(100) NOT NULL,
  `url` longtext NOT NULL,
PRIMARY KEY (`id`))");

if(!$table){
die('gagal membuat table:'.mysql_error());
}else{
?>
<script language="javascript">alert('database berhasil dibuat');document.location="../";</script>
<?php }?>