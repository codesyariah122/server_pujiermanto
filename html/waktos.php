<?/* contact 
  pujiermanto@gmail.com
  0895345041053
  */
?>
<html>
<head>
<title>Test JS</title>
</head>
<h1 id="waktos"></h1>
<body>
<script type="text/javascript">
	window.onload = function() { waktos(); }
	function waktos() {
	var e = document.getElementById('waktos'),
	    d = new Date(), h, m, s;
	    h = d.getHours();
	    m = set(d.getMinutes());
	    s = set(d.getSeconds());
	e.innerHTML = h +':'+ m +':'+ s;
	setTimeout('waktos()', 1000);
	}
	function set(e) {
		 e = e < 10 ? '0'+ e : e;
		 return e;
}
</script>
</body>
</html>
