<?
require('routeros_api.class.php');
$api=new RouterosAPI();
$api->debug = true;
if($api->connect('192.168.1.1','gnet182','takadezo99')){
	echo "Koneksi Ke mikrotik sukses<br/>";
	$api->disconnect();
}else{
	echo "Tidak bisa konek ke mikrotik";
}
?>
