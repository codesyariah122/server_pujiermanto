<?
require "routeros_api.class.php";
define("MIKROTIK_IP","192.168.1.1");
define("MIKROTIK_USERNAME","gnet182");
define("MIKROTIK_PASSWORD","takadezo99");
define("SERVER","all");
define("PROFILE","default");

$src_address="192.168.1.2";

$api=new RouterosAPI();

if($api->connect(MIKROTIK_IP, MIKROTIK_USERNAME,MIKROTIK_PASSWORD)){
	$api->write("/tool/torch", false);
	$api->write("=src-address=".$src_address, false);
	$api->write("=duration=2", false);
	$api->write("=interface=local", false);
	
	$array=$api->read();
	
	echo "<p>";
	$source=$array[0]["src-address"];
	$tx=$array[0]['tx'];
	$rx=$array[0]['rx'];
	
	echo "source = $source <br>";
	echo "TX = $tx<br>";
	echo "RX = $rx<br>";
	echo "</p>";
}
$api->disconnect();
echo "<p>Selesai .. </p>";
?>
