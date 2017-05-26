//pujiermanto-2017
//beum full masih editing

<?php
function server($hostname, $ip, $os, $linux, $dns){
	return "$hostname";
	return "$ip";
	return "$os";
	return "$linux";
	return "$dns";
}
$hostname = server($_SERVER['SERVER_NAME']);
$ip = server($_SERVER['SERVER_ADDR']);
$os = server(shell_exec("cat /etc/issue.net"));
$linux = server(shell_exec("uname -a | awk '{print $1,$5}'"));
$dns = server(shell_exec("named -v | xargs | awk '{print $1, $2 }'"));
?>
<!DOCTYPE html>
<head>
<meta chaset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Server GNet</title>
<link rel="stylesheet" href="asset_server/style.css" type="text/css">
</head>
<body>
<header>
<h1>Welcome GNET@Network </h1>
<section>Server By : <?=$l;?></section>
</header>
<main>
<fieldset><legend><b>Table Informasi Local Server</b></legend>
<div style="overflow-x:auto;">
<table border="1">
<tr>
<th>Domain Server</th>
<th>IP Address</th>
<th>Operating System</th>
<th>DNS Version</th>
</tr>
<tr>
<td><font color="blue"><b><?=$hostname;?></font></b></td>
<td><?=$ip;?></td>
<td><?=$linux;?></td>
<td><?=$dns;?></td>
</tr>
</table>
</div>
</legend>
</main>
<div class="row">
<fieldset class="cek"><legend><b>Check Toko Sebelah</b></legend>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<button type="submit" class="col-3 menu" name="click_disk">Lihat HDD</button>
<button type="submit" class="col-3 menu" name="click_mem">Lihat Memory</button>
</form>
</fieldset>
</div>

<?php
class serverku {
    var $disk1;
    var $disk2;

     public function kapasitas_disk()  
     {  
     $hasil_disk1= $this->disk1;
     $hasil_disk2= $this->disk2;
     return $hasil_disk1.$hasil_disk2;  
     }  
}
if(isset($_REQUEST['click_disk'])){

$server1 = new serverku;
$server2 = new serverku;
$server1->disk1=shell_exec("df -h | awk '/ 28G /'");
$server2->disk2=shell_exec("df -h | awk '/Size/'");

echo "<table border='1'>
	<tr><th>".$server2->kapasitas_disk()."</th></tr>
	<tr><td>".$server1->kapasitas_disk()."</td></tr></table>";
}
?>
