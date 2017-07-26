    <?
    // pakai do while
    $range=0;
    do{
        echo "add limit-at=512k/1M max-limit=512k/1M name=\"hotspot $range\" parent=\"hotspot gnet\" queue=UP/DOWN target=192.168.200.$range/32\n";
        $range++;
    }while($range <= 254);
    ?>
    
