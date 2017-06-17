<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>GNET@NETWORK</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <meta name="theme-color" content="#EE6E73">
  <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <!-- other costume by me -->

  </head>
    <body>
	
<header>
    <div class="navbar-fixed">
      <nav role="navigation" class="blue darken-4 top-nav">

    <!-- dropdown desktop -->
    <ul id="dropdown" class="dropdown-content">
      <li><a href="#">My Location</a></li>
      <li><a href="#">FAQ</a></li>
    </ul>
    <!-- dropdown desktop -->

    <!-- dropdown mobile -->
    <ul id="dropdown-mobile" class="dropdown-content">
      <li><a href="#">My Location</a></li>
      <li><a href="#">FAQ</a></li>
    </ul>

    <!-- for dropdown_IT -->
    <ul id="dropdown_IT1" class="dropdown-content">
      <li><a href="#">GNet Paket HotSpot</a></li>
      <li><a href="#">Setting Mikrotik</a></li>
      <li><a href="#">Instalasi Proxy Server</a></li>
      <li><a href="#">Instalasi Cyberindo Diskless</a></li>
    </ul>
    <ul id="dropdown_IT2" class="dropdown-content">
      <li><a href="#">GNet Paket HotSpot</a></li>
      <li><a href="#">Setting Mikrotik</a></li>
      <li><a href="#">Instalasi Proxy Server</a></li>
      <li><a href="#">Instalasi Cyberindo Diskless</a></li>
    </ul>
    <!-- for dropdown_IT -->

   <div class="nav-wrapper">
     <a href="#!" id = "top-logo" class="brand-logo center blue-text text-darken-2"></a>
    <h5 class="right light white-text text-white lighten-5">GNet Network</h5>
     <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
     <ul class="left hide-on-med-and-down">
       <li><a href="#" class="dropdown-button" data-activates="dropdown_IT1">Our Service<i class="material-icons right">keyboard_arrow_down</i></a></li>
       <li><a href="#" class="dropdown-button" data-activates="dropdown">Contact<i class="material-icons right">keyboard_arrow_down</i></a></li>
     </ul>
   </div>
</nav>
</div>
 <!-- mobile sett nav -->
     <ul class="side-nav" id="mobile-nav">
       <li><a href="#" class="dropdown-button" data-activates="dropdown_IT2">Our Service<i class="material-icons right">keyboard_arrow_down</i></a></li>
       <li><a href="#" class="dropdown-button" data-activates="dropdown-mobile">contact<i class="material-icons right">keyboard_arrow_down</i></a></li>
     </ul>
	 </header>
	 
	 <main>
	 <div class="section-white">
<div class="container">
 <h4 class="red-text">Table Squid Report</h4>	  
<div class="row">
<div class="col m12">
      <table class="hightlight striped">
        <thead>
	<tr>
	<?php $head=array("User Network","Stats","Url");
		for($a=0; $a < count($head);$a++){?>
             <th><?php echo $head[$a];?></th><?php }?>
	</tr>	
        </thead>

        <tbody>

	<?php include_once('koneksi_squid.php');
	$query_squid=mysql_query("select * from access_log ORDER BY id ASC");
	while($result=mysql_fetch_array($query_squid)){
	$ip=$result['ip_address'];
	$stats=$result['Stats'];
	$url=$result['url'];
	$result_array=array($ip,$stats,$url);
	?>
          <tr>
        	<?php for($a=0;$a < count($result_array);$a++){?>
		<td><?php echo $result_array[$a];?></td><?php }?>  
	</tr><?php }?>
        </tbody>
      </table>
            
</div>
</div>
</div>
</div>	 
	 </main>
	 
	 <footer class="page-footer blue">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">GNET@NETWORK</h5>
                <p class="grey-text text-lighten-4">       
				<img src="img/logo_gnet2.png" class="responsive-img" width="100" height="100"/>
				</p>
              </div>
       
            </div>
          </div>
          <div class="footer-copyright blue darken-4">
            <div class="container">
            © 2017 GNET@NETWORK
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>	 
	 
	 
	 
      <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="js/materialize.min.js"></script>
<script>
autoplay()
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}
</script>

<script>
$( document ).ready(function(){
	    $('select').material_select();
  $('ul.tabs').tabs('select_tab', 'tab_id');
  $('.carousel.carousel-slider').carousel({fullWidth: true});
  $(".button-collapse").sideNav();
  $('.parallax').parallax();
  $('.slider').slider({
   indicators: true,
   transition: 1000,
   interval : 4000, });
  $('.modal').modal();
  $('.carousel.carousel-slider').carousel({fullWidth: true});
  $('#modal1').modal('open');
    $('#modal1').modal('close');
});
</script>
    </body>
  </html>