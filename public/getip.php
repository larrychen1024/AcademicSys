<?php
/*获取真实IP*/
function getip() {
if (isset($_SERVER)) {
	if (isset($_SERVER[HTTP_X_FORWARDED_FOR])) 
	{
   		$realip = $_SERVER[HTTP_X_FORWARDED_FOR];
		} else 
		if (isset($_SERVER[HTTP_CLIENT_IP])) 
		{
   			$realip = $_SERVER[HTTP_CLIENT_IP];
} else {
   $realip = $_SERVER[REMOTE_ADDR];
}
} else {
if (getenv("HTTP_X_FORWARDED_FOR")) {
   $realip = getenv( "HTTP_X_FORWARDED_FOR");
} elseif (getenv("HTTP_CLIENT_IP")) {
   $realip = getenv("HTTP_CLIENT_IP");
} else {
   $realip = getenv("REMOTE_ADDR");
}
}
return $realip;
}

/*函数一：*/

function get_real_ip(){
$ip=false;
if(!empty($_SERVER["HTTP_CLIENT_IP"])){
$ip = $_SERVER["HTTP_CLIENT_IP"];
}
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
for ($i = 0; $i < count($ips); $i++) {
if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
$ip = $ips[$i];
break;
}
}
}
return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}



/*函数二：*/

function strFunIP()
{
if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])
$ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])
$ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"])
$ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
elseif (getenv("HTTP_X_FORWARDED_FOR"))
$ip = getenv("HTTP_X_FORWARDED_FOR");
elseif (getenv("HTTP_CLIENT_IP"))
$ip = getenv("HTTP_CLIENT_IP");
elseif (getenv("REMOTE_ADDR"))
$ip = getenv("REMOTE_ADDR");
else
$ip = "Unknown";
return $ip;
}
?>