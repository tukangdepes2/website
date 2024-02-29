<?php
@error_reporting(0);
@set_time_limit(0);
?>
<html>
<head>
<title>[+] Nhentai Reader + Download [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
  <font size=5>Nhentai Reader + Download</font><br><font face=Staatliches size=3>solusi selain make vpn asal ingat kode nuklir na wkwk</font><hr>
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

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
   var loading = document.getElementById("loading").innerHTML;
   var berhasil = loading.replace('Loading ...', 'Berhasil !!!<br>Silahkan Check <a href=hasil><font color=yellow>Disini</font></a>');
   document.getElementById('loading').innerHTML = berhasil;
}, false);
</script>
<form method="post">
<input type="number" name="url" height="20" placeholder="334430" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" style="margin: 5px auto; padding-left: 5px;" required></textarea><br>
<input type="submit" name="go" value="Gaskan" onclick="ngeklik()">
<font><hr><a href="hasil" target="_blank"><font color=white>Hasil Submit</font></a>
<?php
$kode = $_POST['url'];
$submit = $_POST['go'];
//$web = array('http://justkegabutan.herokuapp.com/api/v1/nhentai?d=', 'http://information-new.herokuapp.com/api/v1/nhentai?d=');
$ekseweb = $web[array_rand($web)];
if($submit) {
$url = "curl --ipv4 http://myrandom-api.herokuapp.com/api/v1/nhentai?d=".$kode;
$gas = exec($url);
$cok = json_decode($gas);
$asu = $cok->title;
if (empty($asu)) {
  echo "<script>alert('doujin tidak di temukan !');</script>";
  echo '<meta http-equiv="refresh" content="0;url=#" />';
  exit();
}
if (file_exists("/tmp/tempku/nhentai")) {
} else {
  exec("mkdir /tmp/tempku/nhentai");
}
if (file_exists("hasil/".$kode."")) {
  echo "<script>alert('doujin ini sudah pernah di submit, silahkan check Daftar Hasil untuk melihatnya');</script>";
  echo '<meta http-equiv="refresh" content="0;url=#" />';
  exit();
}
echo "<hr><font id='loading'>Loading ...";
echo "<br><font><br>Judul : <font color=orange><i>" . $asu . "</i></font><font><br>Kode : <font color=orange>" . $kode . "</font><br><br>";
echo "<img src='https://external-content.duckduckgo.com/iu/?u=".$cok->cover."' onerror='this.style.display=none'<br>";
$asucov = "cd hasil && mkdir " . $kode . "";
exec($asucov);
$tempnya = fopen("/tmp/tempku/nhentai/".$kode.".txt", "a");
fwrite($tempnya, $cok->pages[0]."\n");
fwrite($tempnya, $cok->pages[1]."\n");
fwrite($tempnya, $cok->pages[2]."\n");
fwrite($tempnya, $cok->pages[3]."\n");
fwrite($tempnya, $cok->pages[4]."\n");
fwrite($tempnya, $cok->pages[5]."\n");
fwrite($tempnya, $cok->pages[6]."\n");
fwrite($tempnya, $cok->pages[7]."\n");
fwrite($tempnya, $cok->pages[8]."\n");
fwrite($tempnya, $cok->pages[9]."\n");
fwrite($tempnya, $cok->pages[10]."\n");
fwrite($tempnya, $cok->pages[11]."\n");
fwrite($tempnya, $cok->pages[12]."\n");
fwrite($tempnya, $cok->pages[13]."\n");
fwrite($tempnya, $cok->pages[14]."\n");
fwrite($tempnya, $cok->pages[15]."\n");
fwrite($tempnya, $cok->pages[16]."\n");
fwrite($tempnya, $cok->pages[17]."\n");
fwrite($tempnya, $cok->pages[18]."\n");
fwrite($tempnya, $cok->pages[19]."\n");
fwrite($tempnya, $cok->pages[20]."\n");
fwrite($tempnya, $cok->pages[21]."\n");
fwrite($tempnya, $cok->pages[22]."\n");
fwrite($tempnya, $cok->pages[23]."\n");
fwrite($tempnya, $cok->pages[24]."\n");
fwrite($tempnya, $cok->pages[25]."\n");
fwrite($tempnya, $cok->pages[26]."\n");
fwrite($tempnya, $cok->pages[27]."\n");
fwrite($tempnya, $cok->pages[28]."\n");
fwrite($tempnya, $cok->pages[29]."\n");
fwrite($tempnya, $cok->pages[30]."\n");
fwrite($tempnya, $cok->pages[31]."\n");
fwrite($tempnya, $cok->pages[32]."\n");
fwrite($tempnya, $cok->pages[33]."\n");
fwrite($tempnya, $cok->pages[34]."\n");
fwrite($tempnya, $cok->pages[35]."\n");
fwrite($tempnya, $cok->pages[36]."\n");
fwrite($tempnya, $cok->pages[37]."\n");
fwrite($tempnya, $cok->pages[38]."\n");
fwrite($tempnya, $cok->pages[39]."\n");
fwrite($tempnya, $cok->pages[40]."\n");
fwrite($tempnya, $cok->pages[41]."\n");
fwrite($tempnya, $cok->pages[42]."\n");
fwrite($tempnya, $cok->pages[43]."\n");
fwrite($tempnya, $cok->pages[44]."\n");
fwrite($tempnya, $cok->pages[45]."\n");
fwrite($tempnya, $cok->pages[46]."\n");
fwrite($tempnya, $cok->pages[47]."\n");
fwrite($tempnya, $cok->pages[48]."\n");
fwrite($tempnya, $cok->pages[49]."\n");
fwrite($tempnya, $cok->pages[50]."\n");
fwrite($tempnya, $cok->pages[51]."\n");
fwrite($tempnya, $cok->pages[52]."\n");
fwrite($tempnya, $cok->pages[53]."\n");
fwrite($tempnya, $cok->pages[54]."\n");
fwrite($tempnya, $cok->pages[55]."\n");
fwrite($tempnya, $cok->pages[56]."\n");
fwrite($tempnya, $cok->pages[57]."\n");
fwrite($tempnya, $cok->pages[58]."\n");
fwrite($tempnya, $cok->pages[59]."\n");
fwrite($tempnya, $cok->pages[60]."\n");
fwrite($tempnya, $cok->pages[61]."\n");
fwrite($tempnya, $cok->pages[62]."\n");
fwrite($tempnya, $cok->pages[63]."\n");
fwrite($tempnya, $cok->pages[64]."\n");
fwrite($tempnya, $cok->pages[65]."\n");
fwrite($tempnya, $cok->pages[66]."\n");
fwrite($tempnya, $cok->pages[67]."\n");
fwrite($tempnya, $cok->pages[68]."\n");
fwrite($tempnya, $cok->pages[69]."\n");
fwrite($tempnya, $cok->pages[70]."\n");
fwrite($tempnya, $cok->pages[71]."\n");
fwrite($tempnya, $cok->pages[72]."\n");
fwrite($tempnya, $cok->pages[73]."\n");
fwrite($tempnya, $cok->pages[74]."\n");
fwrite($tempnya, $cok->pages[75]);
fclose($tempnya);
exec("cp index_nuklir.php hasil/".$kode."/index.php");
$file_data = "<center><font>Judul : <b><font color=yellow>" . $asu . "</b></font><br>Kode : <b><font color=yellow>" . $kode . "</b></font><br>";
$file_data .= file_get_contents('hasil/'.$kode.'/index.php');
file_put_contents('hasil/'.$kode.'/index.php', $file_data);
$tambahin = "<br><font size=2><a href='" . $kode . "'><font color=yellow size=2>" . $kode . "</font></a> <font color=white siz=2>[ " . $asu . " ]</font>";
file_put_contents("hasil/index.php", $tambahin, FILE_APPEND | LOCK_EX);
exec("cd tmp && xargs -P 0 -n 1 wget -P ../hasil/".$kode." < ".$kode.".txt");
exec('cd hasil/'.$kode.'');
// rename.ul -o -v .jpg .png *.jpg
}
?>
<font><hr>Unknown45 - 2021<br>