<?php
$handle = fopen ("https://pastebin.com/raw/5NHaxyGR", "rb");
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
