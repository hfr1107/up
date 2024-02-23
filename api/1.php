<?php
$handle = fopen ("https://t4vod.hz.cz/api/pz?url=http://饭太硬.top/tv", "rb");
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
