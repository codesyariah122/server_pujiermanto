<?
function koneksi($host=' ',$user=' ',$pass=' '){
	if(($host==$host)&&($user==$user)&&($pass==$pass)){
	$connect_mysql=mysql_connect($host,$user,$pass);
	if(!$connect_mysql):
	die('gagal terhubung ke database:'.mysql_error());
	endif;
	}
}
function database($db=' '){
	if(!empty($db)){
		$use_database=mysql_select_db($db);
		if(!$db):
		die('gagal memilih database:'.mysql_error());
		endif;
	}
}
?>