<?php 
if(strlen($_SERVER['REQUEST_URI']) > 384 ||
    strpos($_SERVER['REQUEST_URI'], "eval(") ||
	strpos($_SERVER['REQUEST_URI'], "base64")) {
		@header("HTTP/1.1 414 Request-URI Too Long");
		@header("Status: 414 Request-URI Too Long");
		@header("Connection: Close");
		@exit;
}
//通过 QUERY_STRING 取得完整的传入数据，然后取得 url=之后的所有值，兼容性更好
$t_url = preg_replace('/^url=(.*)$/i','$1',$_SERVER["QUERY_STRING"]);
 
//此处可以自定义一些特别的外链，不需要可以删除以下 5 行
if($t_url=="zhangge" ) {
   $t_url="https://zhang.ge";
} elseif($t_url=="baidu") {
   $t_url="https://www.baidu.com/";
}
 
//数据处理
if(!empty($t_url)) {
    //判断取值是否加密
    if ($t_url == base64_encode(base64_decode($t_url))) {
        $t_url =  base64_decode($t_url);
    }
    //对取值进行网址校验和判断
    preg_match('/^(http|https|thunder|qqdl|ed2k|Flashget|qbrowser):\/\//i',$t_url,$matches);
	if($matches){
	    $url=$t_url;
	    $title='页面加载中,请稍候...';
	} else {
	    preg_match('/\./i',$t_url,$matche);
	    if($matche){
	        $url='http://'.$t_url;
	        $title='页面加载中,请稍候...';
	    } else {
	        $url = 'http://'.$_SERVER['HTTP_HOST'];
	        $title='参数错误，正在返回首页...';
	    }
	}
} else {
    $title = '参数缺失，正在返回首页...';
    $url = 'http://'.$_SERVER['HTTP_HOST'];
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="robots" content="noindex, nofollow" />
<noscript><meta http-equiv="refresh" content="1;url='<?php echo $url;?>';"></noscript>
<script>
function link_jump()
{
    //禁止其他网站使用我们的跳转页面
    var MyHOST = new RegExp("<?php echo $_SERVER['HTTP_HOST']; ?>");
    if (!MyHOST.test(document.referrer)) {
         location.href="http://" + MyHOST;
    }
    location.href="<?php echo $url;?>";
}
//延时 1S 跳转，可自行修改延时时间
setTimeout(link_jump, 1000);
//延时 50S 关闭跳转页面，用于文件下载后不会关闭跳转页的问题
setTimeout(function(){window.opener=null;window.close();}, 50000);
</script>
<title><?php echo $title;?></title>
<style type="text/css">
body{background:#555}.loading{-webkit-animation:fadein 2s;-moz-animation:fadein 2s;-o-animation:fadein 2s;animation:fadein 2s}@-moz-keyframes fadein{from{opacity:0}to{opacity:1}}@-webkit-keyframes fadein{from{opacity:0}to{opacity:1}}@-o-keyframes fadein{from{opacity:0}to{opacity:1}}@keyframes fadein{from{opacity:0}to{opacity:1}}.spinner-wrapper{position:absolute;top:0;left:0;z-index:300;height:100%;min-width:100%;min-height:100%;background:rgba(255,255,255,0.93)}.spinner-text{position:absolute;top:45%;left:50%;margin-left:-100px;margin-top:2px;color:#000;letter-spacing:1px;font-size:20px;font-family:Arial}.spinner{position:absolute;top:45%;left:50%;display:block;margin-left:-160px;width:1px;height:1px;border:20px solid rgba(255,0,0,1);-webkit-border-radius:50px;-moz-border-radius:50px;border-radius:50px;border-left-color:transparent;border-right-color:transparent;-webkit-animation:spin 1.5s infinite;-moz-animation:spin 1.5s infinite;animation:spin 1.5s infinite}@-webkit-keyframes spin{0%,100%{-webkit-transform:rotate(0deg) scale(1)}50%{-webkit-transform:rotate(720deg) scale(0.6)}}@-moz-keyframes spin{0%,100%{-moz-transform:rotate(0deg) scale(1)}50%{-moz-transform:rotate(720deg) scale(0.6)}}@-o-keyframes spin{0%,100%{-o-transform:rotate(0deg) scale(1)}50%{-o-transform:rotate(720deg) scale(0.6)}}@keyframes spin{0%,100%{transform:rotate(0deg) scale(1)}50%{transform:rotate(720deg) scale(0.6)}}
</style>
</head>
<body>
<div class="loading">
  <div class="spinner-wrapper">
    <span class="spinner-text">页面加载中，请稍候...</span>
    <span class="spinner"></span>
  </div>
</div>
</body>
</html>
