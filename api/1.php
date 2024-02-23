<?php
$handle = fopen ("http://lige.unaux.com/?url=http://%E9%A5%AD%E5%A4%AA%E7%A1%AC.top/tv&i=1", "rb");
$contents = "";
do {
$data = fread($handle, 1024);
if (strlen($data) == 0) {
break;
}
$contents .= $data;
} while(true);
fclose ($handle);
echo $contents;
?>
