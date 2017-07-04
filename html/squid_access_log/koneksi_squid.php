<?php
$host = "localhost";
$userhost = "root";
$passhost = "1";
$database = "squid";
$koneksi = mysql_connect($host, $userhost, $passhost);
if($koneksi){
$pilih = mysql_select_db($database, $koneksi);

if($pilih){
echo "Berhasil menemukan database ".$database;
}
else{
echo "Database " .$database. "tidak ditemukan";
}
}else{
echo "Koneksi database GAGAL";
}
?>