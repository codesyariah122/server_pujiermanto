<a href="http://sandbox.onlinephpfunctions.com/code/97cb80578bd1c826b896bdfe5e56f872ffe3be45">Link</a>
<?
function client($ip=' '){
    $range=0;
    do{
        echo "add limit-at=512k/1M max-limit=512k/1M name=\"hotspot $range\" parent=\"hotspot gnet\" queue=UP/DOWN target=192.168.200.$range/32\n";
        $range++;
    }while($range <= 254);
}
client();
?>
