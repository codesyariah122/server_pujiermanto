<?php
require('routeros_api.class.php');
// Ubah sesuai setting mikrotik Anda
define('MIKROTIK_IP', '192.168.1.1');
define('MIKROTIK_USERNAME', 'admin');
define('MIKROTIK_PASSWORD', '12345');
define('SERVER', 'all');
define('PROFILE', 'default');
$API = new RouterosAPI();
// Aktifkan debug
$API->debug = true;
if ($API->connect(MIKROTIK_IP, MIKROTIK_USERNAME, MIKROTIK_PASSWORD))
{
$API->write('/ip/firewall/nat/add', false);
$API->write('=chain=srcnat',false);
$API->write('=src-address=192.168.90.0/24',false);
$API->write('=action=masquerade', false);
$API->write('=disabled=yes');
$ARRAY = $API->read();
}
$API->disconnect();
echo "<p>Selesai..<br>";
?>
