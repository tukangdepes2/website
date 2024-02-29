<?php 
@ini_set('output_buffering',0); 
@ini_set('display_errors', 0);
$text = $_POST['mbutt'];
?>
<html>
<head>
<title>[+] Encode Online [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
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

select {
  background: transparent;
  color: #ffffff;
}

select option {
  background-color: #1e1e1e;
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

select::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

select::-webkit-scrollbar-track {
  background: #1e1e1e;        /* color of the tracking area */
}

select::-webkit-scrollbar-thumb {
  background-color: #1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}
</style>
<link href="http://fonts.googleapis.com/css?family=Orbitron:700" rel="stylesheet" type="text/css">
<center>
<font size=5 face=courier new>
Encode & Decode
</font><hr>
<form method="post">
<textarea class='inputz' cols=50 rows=10 name="mbutt">
</textarea>
<br><br>

<select size="1" name="ope">

<option>
<center>[+] SELECT ENCRYPTIONS
</option>

<option value="urlencode">URL</option>

<option value="base64">BASE64</option>

<option value="ur">CONVERT_UU</option>

<option value="json">JSON</option>

<option value="gzinflates">GZINFLATE - BASE64</option>

<option value="str2">STR_ROT13 - BASE64</option>

<option value="gzinflate">STR_ROT13 - GZINFLATE - BASE64</option>

<option value="gzinflater">GZINFLATE - STR_ROT13 - BASE64</option>

<option value="gzinflatex">GZINFLATE - STR_ROT13 - GZINFLATE - BASE64</option>

<option value="gzinflatew">STR_ROT13 - CONVERT_UU - URL - GZINFLATE - STR_ROT13 - BASE64 - CONVERT_UU - GZINFLATE - URL - STR_ROT13 - GZINFLATE - BASE64</option>

<option value="str">STR_ROT13 - GZINFLATE - STR_ROT13 - BASE64</option>

<option value="url">BASE64 - GZINFLATE - STR_ROT13 - CONVERT_UU - GZINFLATE - BASE64</option>

<option value="hexencode">HEX ENCODE-DECODE</option>

<option value="md5"><center>MD5 HASH</option>

<option value="sha1">SHA1 HASH</option>

<option value="str_rot13">ROT13 HASH</option>

<option value="strlen">STRLEN</option>

<option value="xxx">UNESCAPE</option>

<option value="bbb">CHAR AT</option>

<option value="aaa">CHR - BIN2HEX - SUBSTR</option>

<option value="www">CHR</option>

<option value="sss">HTMLSPECIALCHARS</option>

<option value="eee">ESCAPE</option></select>
<br><br>
<input class='asu' type='submit' name='submit' value='ENCODE'>

<input class='asu' type='submit' name='crack' value='DECODE'>
<br>
</select>&nbsp;
</form>

<?php 
$submit = $_POST['submit'];
if (isset($submit)){
$op = $_POST["ope"];
switch ($op) {case 'base64': $codi=base64_encode($text);
break;case 'str' : $codi=(base64_encode(str_rot13(gzdeflate(str_rot13($text)))));
break;case 'json' : $codi=json_encode(utf8_encode($text));
break;case 'gzinflate' : $codi=base64_encode(gzdeflate(str_rot13($text)));
break;case 'gzinflater' : $codi=base64_encode(str_rot13(gzdeflate($text)));
break;case 'gzinflatex' : $codi=base64_encode(gzdeflate(str_rot13(gzdeflate($text))));
break;case 'gzinflatew' : $codi=base64_encode(gzdeflate(str_rot13(rawurlencode(gzdeflate(convert_uuencode(base64_encode(str_rot13(gzdeflate(convert_uuencode(rawurldecode(str_rot13($text))))))))))));
break;case 'gzinflates' : $codi=base64_encode(gzdeflate($text));
break;case 'str2' : $codi=base64_encode(str_rot13($text));
break;case 'urlencode' : $codi=rawurlencode($text);
break;case 'hexencode' : $codi=bin2hex($text);
break;case 'md5' : $codi=md5($text);
break;case 'ur' : $codi=convert_uuencode($text);
break;case 'str_rot13' : $codi=str_rot13($text);
break;case 'sha1' : $codi=sha1($text);
break;case 'strlen' : $codi=strlen($text);
break;case 'xxx' : $codi=strlen(bin2hex($text));
break;case 'bbb' : $codi=htmlentities(utf8_decode($text));
break;case 'aaa' : $codi=chr(bin2hex(substr($text)));
break;case 'www' : $codi=chr($text);
break;case 'sss' : $codi=htmlspecialchars($text);
break;case 'eee' : $codi=addslashes($text);
break;case 'url' : $codi=base64_encode(gzdeflate(convert_uuencode(str_rot13(gzdeflate(base64_encode($text))))));
break;default:break;}}

$submit = $_POST['crack'];
if (isset($submit)){
$op = $_POST["ope"];
switch ($op) {case 'base64': $codi=base64_decode($text);
break;case 'str' : $codi=str_rot13(gzinflate(str_rot13(base64_decode(($text)))));
break;case 'json' : $codi=utf8_dencode(json_dencode($text));
break;case 'gzinflate' : $codi=str_rot13(gzinflate(base64_decode($text)));
break;case 'gzinflater' : $codi=gzinflate(str_rot13(base64_decode($text)));
break;case 'gzinflatex' : $codi=gzinflate(str_rot13(gzinflate(base64_decode($text))));
break;case 'gzinflatew' : $codi=str_rot13(rawurldecode(convert_uudecode(gzinflate(str_rot13(base64_decode(convert_uudecode(gzinflate(rawurldecode(str_rot13(gzinflate(base64_decode($text))))))))))));
break;case 'gzinflates' : $codi=gzinflate(base64_decode($text));
break;case 'str2' : $codi=str_rot13(base64_decode($text));
break;case 'urlencode' : $codi=rawurldecode($text);
//break;case 'hexencode' : $codi=quoted_printable_decode($text);
break;case 'hexencode' : $codi=hex2bin($text);
break;case 'ur' : $codi=convert_uudecode($text);
break;case 'url' : $codi=base64_decode(gzinflate(str_rot13(convert_uudecode(gzinflate(base64_decode(($text)))))));
break;default:break;}}
$html = htmlentities(stripslashes($codi));
echo "
<from>

<textarea cols=50 rows=10 style='onfocus();' onclick='this.select();' class='inputz' readonly>".$html."</textarea><BR/><BR/></center></from>";
?></b></i>
<center><hr><font size=3>Unknown45 - 2021
</html>

