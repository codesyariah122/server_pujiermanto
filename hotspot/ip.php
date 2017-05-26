<?php
for($a=1; $a <= 254; $a++){
  echo 'add max-limit=1M/2M name=queue'.$a.' parent="hotspot global" queue=hotspot-default/hotspot-default target=192.168.200.'.$a.
  '/32<br/>';
}
?>
