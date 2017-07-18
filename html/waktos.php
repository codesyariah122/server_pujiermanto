<?/* contact 
  pujiermanto@gmail.com
  0895345041053
  */
?>
<html>
<head>
<title>Test JS</title>
</head>

<body>
<script language="javascript">
function waktos(){
var waktu=new Date();
var judul = "Ayena Tabuh :";
var jam   = waktu.getHours();
var menit = waktu.getMinutes();
var detik = waktu.getSeconds();

document.body.innerHTML = judul+"&nbsp;"+jam+":"+menit+":"+detik;
}
setInterval(waktos, 1000);
</script>
</body>
</html>
