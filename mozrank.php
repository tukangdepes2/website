<html>
<head>
<title>[+] MozRank Checker [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center><font face=courier new size=5>MozRank Checker<br><hr></font>
<font face=courier new size=2>| DA = Domain Authority | PA = Page Authority | MR = MozRank | EL = External Links to URL
 |</font><br><br>
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 100%;
height: 150px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
}

button {
  background: transparent;
    font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

input {
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
  background: #1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: #1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}
</style>
<form method="post">
<textarea name="url_form" cols="40" rows="8" style="width: 400px">
<?=$_REQUEST['url_form'];?>
</textarea >
<br><br>
<input type="submit" class="asu" value="Check" />
</form>
</center>
<?php
if($_REQUEST['url_form']) {
$urls = trim($_POST['url_form']);
$urls = explode("\n", $urls);
$urls = array_filter($urls, 'trim');
}
if(!$urls) {
exit;
}
?>
<div style="margin: auto; width: 34%; min-width: 400px">
<table width="500" cellpadding="5" cellspacing="5">
<thead style="text-align: left"><hr>
         <tr><th>NO</th><th>URL</th><th>DA</th><th>PA</th><th>MR</th><th>EL</th></tr></thead>
<tbody>
<?php
$hitung = 0;
$urlx = array();
$verif_url = array_chunk($urls,80);
foreach($verif_url as $chunk) {
sleep(2);
unset($url);
$url = $chunk;
$seo = API_MOZ($url);
if($seo['error'] != '') {
echo "Error[SEOMoz]: ".$seo['error']."<br>";
} else {
foreach($seo as $index => $data) {
$urls['pa'] = number_format($data['pa'], 0, '.', '');
$urls['url'] = $data['url'];
$urls['da'] = number_format($data['da'], 0, '.', '');
$urls['title'] = $data['title'];
$urls['external_links'] = $data['external_links'];
$urls['mozrank'] = number_format($data['mozrank'], 2, '.', '');
$hitung++;
echo "<tr><td>";
echo $hitung;
echo "</td><td>";
echo str_replace("http://","",$urls['url']);
echo "</td><td>";
echo $urls['da'];
echo "</td><td>";
echo $urls['pa'];
echo "</td><td>";
echo $urls['mozrank'];
echo "</td><td>";
echo $urls['external_links'];
echo "</td>";
echo "</tr>";
$urlx[] = $urls;
}
}
}
?>
</tbody></table>
<?php
$_SESSION['urlx'] = $urlx;
if(!empty($urlx)) { }
?>
</center>
</div>
<?php
// Document code by Moz
// www.stateofdigital.com
function API_MOZ($objectURL) {
// cek https://moz.com/products/api/keys untuk mendapatkan accessID dan secretKey nya
// your accessID
$accessID = "mozscape-4f3765f6c2";
// your secretKey
$secretKey = "72c60c0d7f5bc0fad86ab432eaaf32ce";
$expires = time() + 600;
$stringToSign = $accessID."\n".$expires;
$binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
$urlSafeSignature = urlencode(base64_encode($binarySignature));
$cols = 68719476736+34359738368+536870912+32768+16384+2048+32+4;
$requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/?Cols=".$cols."&AccessID=".$accessID."&Expires=".$expires."&Signature=".$urlSafeSignature;
$batchedDomains = $objectURL;
$encodedDomains = json_encode($batchedDomains);
$options = array(CURLOPT_RETURNTRANSFER => true, CURLOPT_POSTFIELDS =>$encodedDomains);
$ch = curl_init($requestUrl);
curl_setopt_array($ch, $options);
$content = curl_exec($ch);
curl_close( $ch );
$response = json_decode($content,true);
$count = 0;
if(isset($response['error_message'])) {
$list = array('error'=>$response['error_message']);
} else {
foreach($response as $metric) {
$list[$count]['url'] = $objectURL[$count];
$list[$count]['subdomain'] = $metric['ufq'];
$list[$count]['domain'] = $metric['upl'];
$list[$count]['pa'] = $metric['upa'];
$list[$count]['da'] = $metric['pda'];
$list[$count]['mozrank'] = $metric['umrp'];
$list[$count]['title'] = $metric['ut'];
$list[$count]['external_links'] = $metric['ueid'];
$count++;  
}
}
return $list;	
}
?>
<center><hr><font size=3>Unknown45 - 2021</font>
