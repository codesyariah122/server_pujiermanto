<?php 
function server($server = ' '){
if($server == "sysadmin"){
$sysadmin = "Puji Ermanto";
echo $sysadmin;
}
elseif($server == "jam"){
$server = shell_exec("date");
echo $server;
}
elseif($server == "hostname"){
$server = $_SERVER['SERVER_NAME'];
echo $server;
}
elseif($server == "ip"){
$server = $_SERVER['SERVER_ADDR'];
echo $server;
}
elseif($server == "os"){
$server = shell_exec("lsb_release -d | awk '{print $2,$3,$4,$5}'");
echo $server;
}
elseif($server == "linux"){
$server = shell_exec("uname -a | awk '{print $1,$5}'");
echo $server;
}
elseif($server == "dns"){
$server = shell_exec("dnscrypt-proxy -V");
echo $server;
}
} //function end

server("dns");

