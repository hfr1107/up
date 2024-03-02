<?php
$handle = fopen ("https://hfr1107.github.io/up/appmarket/index.php", "rb");
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
