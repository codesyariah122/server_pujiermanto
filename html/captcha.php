<?php
function randAll($a){
$arr = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "v", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
$result = '';
for($i=0;$i<$a;$i++){
$rand = rand(0, (count($arr)-1));
$result .= $arr[$rand];
}
return $result;
}
session_start();
header("Content-type: image/png");
$_SESSION["Captcha"]="";
$gbr = imagecreate(400, 100);
imagecolorallocate($gbr, rand(0, 150), rand(0, 150), rand(0, 150));
$font = "../Fonts/Slabo/Slabo27px-Regular.ttf";
for($i=0;$i<=rand(4,7);$i++) {
$posisi = rand(70,80);
$ukuran_font = rand(40,60);
$color = imagecolorallocate($gbr, rand(150,253), rand(150,252), rand(150,252));
if($i>0){
$angka=randAll(1);
}else{
$angka='';
}
$_SESSION["Captcha"].=$angka;
$kemiringan= rand(-10, 10);
imagettftext($gbr, $ukuran_font, $kemiringan, rand(40,45)*$i, $posisi, $color, $font, $angka);
}
imagepng($gbr);
imagedestroy($gbr);
?>
