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
function jamsekarang(){
var d=new Date();
var title   = "Sekarang Jam :";
var hours   = d.getHours();
var minutes = d.getMinutes();
var secs    = d.getSeconds();

document.body.innerHTML = title+"&nbsp;"+hours+":"+minutes+":"+secs;
}
setInterval(jamsekarang, 1000);
</script>
</body>
</html>
