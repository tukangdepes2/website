<html>
<head>
<title>[+] Google Dorker [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 100%;
width: 100%;
height: 100%;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
max-height: 100%;
}

button {
  background: transparent;
    font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

input {
  max-width: 90%;
  background: transparent;
  font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

font {
  font-family: Staatliches;
}

body::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

body::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}

textarea::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

textarea::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
}

textarea::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}
</style>
<script>
function auto_grow(element) {
    element.style.height = "100%";
    element.style.height = (element.scrollHeight)+"px";
}
function select_all() {
var text_val = document.getElementById('select');
text_val.focus(); // Focus on textarea 
text_val.select();// Select all text  
document.execCommand("Copy");
document.getElementById('select').focus();
}
</script>
<center>
<font face=courier new size=5>Google Dorker<br><font size=3>Solusi Buat Yang Males Manual Dorking + Sering Kena Captcha<br><hr>
<form method="post">
<input type="text" class="area" name="dork" size="55" height="20" placeholder="inurl:/kcfinder" style="margin: 5px auto; padding-left: 5px; font-family: Courier; max-width: 95%" required><br>
<input type="submit" name="go" class ="asu" value="Gaskan">
</form>
<?php
$dorknya = $_POST['dork'];
$submit = $_POST['go'];
if ($submit) {
  ob_implicit_flush(true);
  ob_end_flush();
  echo '<hr>Dork : <font color=orange><i>'.htmlspecialchars($dorknya).'</i></font><br>[ <font style="cursor: pointer;" onclick="select_all();" color="orange">Select All & Copy</font> ]<hr><textarea oninput="auto_grow(this)" id="select">';
/**
* -------- GOOGLE DORKER v1--------
* 
* @Author : Izzeldin Addarda [ Security Ghost ]
* @Big Thanks for Teguh Aprianto about the Google CSE Key!
* 
**/
define('CSE_TOKEN', 'partner-pub-2698861478625135:3033704849');
    function Curl ($url, $post = 0, $headers = 0, $proxy = 0){
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HEADER         => true,
        );
        if($proxy){
            $options[CURLOPT_PROXY] = $proxy;
            $options[CURLOPT_PROXYTYPE] = CURLPROXY_SOCKS5;
        }
        if($post){
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $post;
        }
        if($headers){
            $options[CURLOPT_HTTPHEADER] = $headers;
        }
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }
    function get_string($string, $start, $end){
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }
    $dork = $dorknya;
    $i = 0;
    while(true){
        $headers = array();
        $headers[] = 'Referer: https://cse.google.com/cse?cx='.CSE_TOKEN;
        $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.'.rand(0000, 3333).'.169 Safari/537.36';
        $getInfo = Curl("https://cse.google.com/cse.js?hpg=1&cx=".CSE_TOKEN, 0, $headers);
        preg_match('#"cselibVersion": "(.*?)"#si', $getInfo[1], $csiLib); // CSILIB
        preg_match('#"cx": "(.*?)"#si', $getInfo[1], $cx); // CX
        preg_match('#"cse_token": "(.*?)"#si', $getInfo[1], $cseToken); // CSE TOKEN
        preg_match('#"exp": \["(.*?)", "(.*?)"\]#si', $getInfo[1], $exp); // EXP
        preg_match('#"resultSetSize": "(.*?)"#si', $getInfo[1], $rsz); // RSZ
        $url = "https://cse.google.com/cse/element/v1?rsz=".$rsz[1]."&num=10&&start=".$i."&hl=en&source=gcsc&gss=.com&cselibv=".$csiLib[1]."&cx=".$cx[1]."&q=".rawurlencode($dork)."&safe=off&cse_tok=".$cseToken[1]."&exp=".$exp[1].",".$exp[2]."&callback=google.search.cse.api16950";
        $json = Curl($url, 0, $headers);
        preg_match_all('#"clicktrackUrl": "(.*?)"#si', $json[1], $trackUrl);
        if($trackUrl[1] != NULL){
            foreach($trackUrl[1] as $index => $key){
                echo urldecode(get_string($key, '&q=', '&sa'))."\n";
            }
        }else{
            echo "\n[!] Done!\n";
            echo "</textarea>";
            echo "<center><hr></i><font size=3>Unknown45 - 2021";
            exit();
        }
        $i = $i+10;
    }
  }
?>
<hr></i><font size=3>Unknown45 - 2021