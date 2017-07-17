<?
if(isset($_REQUEST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$telp=$_POST['telp'];
	$testi=$_POST['testi'];
}
?>
<fieldset><legend>
<h2>Form Testimoni User G-NET</h2></legend>
<form method="post">
<label>Nama</label>
<input type="text" name="name"><br/>
<label>Email</label>
<input type="email" name="email"><br/>
<label>No Telpon</label>
<input type="number" name="telp"><br/>
<label>Testimonial</label>
<textarea name="testi" rows="5" cols="22"></textarea>
<button type="submit" name="submit">Kirim Testimonial</button>
</form>
</fieldset>
<br/><br/>
<fieldset>
<legend><h2>Testimonial User G-NET</h2></legend>

<?if(isset($_REQUEST['submit'])){?>
	<?$handle=fopen("file.txt","a");
	$user_gnet=array($name,$email,$telp,$testi);
	foreach($user_gnet as $gnet){
	fwrite($handle,$gnet."\n");
	}
	}
		fclose($handle);
	?>
<?
$buka=file("file.txt");
foreach($buka as $baca){
echo $baca."<br/>";
}
?>
</fieldset>
