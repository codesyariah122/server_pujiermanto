<fieldset><legend><b>Daftarkan User</b></legend>
<form action="proses_daftar.php" method="post">

<label for="user">Nama User</label>
<input type="text" name="user" id="user"><br/>
<label for="email">Email Address</label>
<input type="email" id="email"  name="email"><br/>
<label for="birthdar">Birthday</label>
<select name="tgl">
<?php
$a=1;
do{?>
<option value="<?php echo $a;?>"><?php echo $a;?></option><?php $a++;}while($a <=31);?></select>&nbsp;

<select name="bln">
<?php
$bln=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
foreach($bln as $x){
echo "<option value=$x>$x</option>";
}?>
</select>
<select name="thn">
<?php $thn=1960; do{?>
<option value="<?php echo $thn;?>"><?php echo $thn;?></option>
<?php $thn++;}while($thn <= 2002);?>
</select>
<br/>


<label for="testi">Testimonial</label>
<textarea name="testi" id="testi"></textarea><br/>

<button class="btn" type="submit" name="enter">Enter User</button>
</form>
</fieldset>
