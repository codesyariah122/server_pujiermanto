<?php

require('routeros_api.class.php');

// Ubah sesuai setting mikrotik Anda
define('MIKROTIK_IP', '192.168.0.1');
define('MIKROTIK_USERNAME', 'admin');
define('MIKROTIK_PASSWORD', '');
define('SERVER', 'all');
define('PROFILE', 'default');

$API = new routeros_api();
// Aktifkan debug
// $API->debug = true;
$nama = "Andi";
$ip = "192.168.1.2";
$limit = "50000/500000";
if ($API->connect(MIKROTIK_IP, MIKROTIK_USERNAME, MIKROTIK_PASSWORD))
{
$API->write('/queue/simple/add', false);
$API->write('=name='.$nama,false);
$API->write('=target-addresses='.$ip, false);
$API->write('=max-limit='.$limit, false);
$API->write('=disabled=no');
$ARRAY = $API->read();
//print_r($ARRAY);
}
$API->disconnect();
echo "<p>Aturan telah ditambahkan..<br>";
?>

