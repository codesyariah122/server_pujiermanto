<html>
<head>
<title>Upload page</title>
</head>
<body>
<?php
//KONEKSI.. 
$host='localhost';
$username='root';
$password='1';
$database='squid_report';
mysql_connect($host,$username,$password);
mysql_select_db($database);
 
if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
 
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }
 
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $query_squid ="INSERT INTO access_log VALUES 
                (
                 NULL,
                 '".addslashes($data[0])."',
                 '".addslashes($data[1])."',        
                 '".addslashes($data[2])."',
		 '".addslashes($data[3])."'
                 )";
  
mysql_query($query_squid) or die(mysql_error()); 
    }
 
    fclose($handle); 
    echo "<br><strong>Import data selesai.</strong>";
    
}else {  ?>
 
<!-- Form Untuk Upload File CSV-->
   Silahkan masukan file csv yang ingin diupload<br /> 
   <form enctype='multipart/form-data' action='' method='post'>
    Cari CSV File anda:<br />
    <input type='file' name='filename' size='100'>
   <input type='submit' name='submit' value='Upload'></form>
 
<?php } mysql_close(); ?>
</body>
</html><br><br><br>
