<?php
$t_url=$_GET['url'];
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="5;url='<?php echo $url;?>';">
<div id="circle"></div>
<div id="circletext"></div>
<div id="circle1"></div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="1;url='<?php echo $url;?>';">
</head>
<body>
</body>
</html>
