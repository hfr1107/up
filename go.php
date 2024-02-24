<?php
$t_url='';
if(!empty($t_url)) {
preg_match('/(http|https):\/\//',$t_url,$matches);
if($matches){
$url=$t_url;
} else {
preg_match('/\./i',$t_url,$matche);
if($matche){
$url='http://'.$t_url;
} else {
$url='http://饭太硬.top/tv';
}
}
} else {
$url='https://pastebin.com/raw/5NHaxyGR';
}
?>
