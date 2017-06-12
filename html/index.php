<?php
function server($sysadmin, $jam, $hostname, $ip, $os, $linux, $dns){
	return "$sysadmin";
	return "$jam";
	return "$hostname";
	return "$ip";
	return "$os";
	return "$linux";
	return "$dns";
}
$sysadmin = "Puji Ermanto";
$jam = server(shell_exec("date"));
$hostname = server($_SERVER['SERVER_NAME']);
$ip = server($_SERVER['SERVER_ADDR']);
$os = server(shell_exec("lsb_release -d | awk '{print $2,$3,$4,$5}'"));
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

<?php
if(isset($_GET['id'])){
if($_GET['id']=="0"){
?>
<script language="javascript">alert('form cek koneksi harap di isi terlebih dahulu, ulangi bray!!');</script>
<?php }}?>

<header>
<h1>Welcome GNET@Network </h1>
<section>Server By : <?=$linux;?> <br/>sysadmin : <?=$sysadmin;?><br/><?=$jam;?></section>
</header>
<center>
<main>
<fieldset><legend><b>Table Informasi Local Server</b></legend>
<div style="overflow-x:auto;">

<table style="width:600px;" border="1">
<tr>
<th>Domain Server</th>
<th>IP Address</th>
<th>Operating System</th>
<th>DNS Version</th>
</tr>
<tr>
<td><font color="blue"><b><?=$hostname;?></font></b></td>
<td><?=$ip;?></td>
<td><?=$os;?></td>
<td><?=$dns;?></td>
</tr>
</table>
</div>
</legend>
</main>
<br/><br/>
<fieldset class="cek"><legend><b>Check Toko Sebelah</b></legend>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="row">
<button type="submit" class="col-3 menu" name="click_check" value="disk">Lihat HDD</button>
<button type="submit" class="col-3 menu" name="click_check" value="sys">System log</button>
<button type="submit" class="col-3 menu" name="click_check" value="squid">Squid log</button>
<button type="submit" class="col-3 menu" name="click_check" value="dns">DNS Log</button>
<button type="submit" class="col-3 menu" name="click_check" value="dns">Restart(need root)</button>
<button type="submit" class="col-3 menu" name="click_check" value="dns">Squid Restart</button>
</div>
</form>
<br/>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<label for="ping">Cek Koneksi ke : </label>
<input type="text" name="ping" placeholder="google.com"><br>
<button style="margin-left:7em;" class="col-3 menu" type="submit" name="check_network">Check Ping</button><br/>
</form>
</fieldset>

<?php
class serverku {
    var $ping;	
    var $disk1;
    var $disk2;
    var $sys;

     public function service_server()
     {
     $connect = $this->ping;
     $hasil_disk1= $this->disk1;
     $hasil_disk2= $this->disk2;
     $syslog = $this->sys;
     
return $connect. $hasil_disk1. $hasil_disk2. $syslog;
     }
}

?>
<?php 

//check Ping

if(isset($_POST['check_network'])){

$ping = $_POST['ping'];
?>

<fieldset><legend><b>Hasil Ping ke <?php echo $ping;?> </b></legend>

<?php
if(!empty($ping)){

$koneksi = new serverku;
$koneksi->ping=nl2br(shell_exec("ping -c 1 $ping"));
$conn = $koneksi->ping;
echo $conn;

}else{
header('location:index.php?id=0');
  }	
}
?>

</fieldset>



<?php
// check disk

switch($_REQUEST['click_check']):

case 'disk':

for($a=1;$a<=100;$a++){
echo "=";
}

$server1 = new serverku;

$server2 = new serverku;

$server1->disk1=shell_exec("df -h | awk '/ 28G /'");

$server2->disk2=shell_exec("df -h | awk '/ Size/'");

$disk1=$server1->disk1;

$disk2=$server2->disk2;

$pecah_disk1 = explode(" ",$disk1);
$x1 = $pecah_disk1[0];
$x2 = $pecah_disk1[8];
$x3 = $pecah_disk1[10];
$x4 = $pecah_disk1[13];
$x5 = $pecah_disk1[16];
$x6 = $pecah_disk1[17];

$pecah_disk2 = explode(" ",$disk2);
$y1 = $pecah_disk2[0];
$y2 = $pecah_disk2[1];
$y2 = $pecah_disk2[6];
$y3 = $pecah_disk2[8];
$y4 = $pecah_disk2[9];
$y5 = $pecah_disk2[10];
$y6 = $pecah_disk2[11];
$y7 = $pecah_disk2[12];


$check_disk = array($y1, $y2, $y3, $y4, $y5, $y6, $y7);

echo "<fieldset><legend><b>Table Informasi Kapasitas HDD</b></legend>";

echo "<div style='overflow-x:auto;'>
<table border='1'>
<tr>";

foreach($check_disk as $tools_disk){

echo "<th>".$tools_disk."</th>";
}

echo "</tr>";

echo "<tr>";

$disk_check = array($x1, $x2, $x3, $x4, $x5, $x6);

foreach($disk_check as $disk_tools){
 echo "<td>$disk_tools</td>";
}

echo "</tr>
</table>
</div>
</fieldset>";

break;

// check system
case 'sys':

for($a=1;$a<=100;$a++){
echo "=";
}

$system_log = new serverku;
$system_log->sys=shell_exec("cat /var/www/html/sys.txt | awk '{print $1, $2, $3}'");
$logsystem=$system_log->sys;
$pecah_syslog=explode(" ",$logsystem);

include('pecah_sys.php');
$syslog_debian=array($z0, $z1, $z18);

echo "<fieldset><legend><b>Table Informasi systemlog</b></legend>";
echo "<div style='overflow-x:auto;'>
<table border='1'>
<tr>";
echo "<th>Time</th>
<th>Name</th>
<th>Services</th>
</tr>";
echo "<tr>";
foreach($syslog_debian as $systech){
echo "<td>$systech</td>";
}
echo "</tr>
</table>
</div>";


break;
endswitch;
?>
</center>
