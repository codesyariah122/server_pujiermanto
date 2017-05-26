<style>
header{
 background-color:#262626;
 width:100%;
 height:8em;
 box-shadow: 0px 1px 50px #5E5E5E;
 position:fixed;
 top:2px;
 color:#ffffff;
 text-align:center;
}
main {
 margin-top:15em;
 margin-bottom:2em;
}
fieldset{
 width:25em;
}
table {
 border-collapse: collapse;
 widt:100%
}
th {
    background-color: #4CAF50;
    color: white;
}
th,td{
 text-align: center;
 padding: 15px;
 font-weight:bold;
 font-size:16px;
}
 tr: nth-child(even){background-color: #f2f2f2}
 tr:hover {background-color: #f5f5f5}

</style>
<?$l="GNET@NETWORK";?>
<header>
<h1>Welcome <?=$l;?> </h1>
<section>Server By : <?=$l;?></section>
</header>
<main><center>
<fieldset><legend><b>Table Informasi User Hotspot Gnet</b></legend>
<table border="1">
  <tr>
    <th>Username</th>
    <th>Password</th>
  </tr>
    <? $user=array("user1"=>"gilang1",
                    "user2"=>"padasep2",
                    "user3"=>"tehelis3",
                    "user4"=>"bumimin4",
                    "user5"=>"gingin5" );
                    $password="takadezo99";
    ?>
    <?foreach($user as $_x){?>
      <tr>
        <td><?=$_x;?></td>
    <td><?=$password;?></td>
  </tr><?}?>
</table>
</fieldset></center>
