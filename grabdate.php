

<html>
<head>
<title>[+] Grab Domain by Date [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');


textarea {
max-width: 100%;
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

textarea::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
  cursor: pointer;
}

textarea::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
  cursor: pointer;
}

textarea::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
  cursor: pointer;
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

error {
  color: yellow;
}

kentod {
  color: orange;
  cursor: pointer;
}
</style>
<script type="text/javascript">
  function select_all() {
  var text_val = document.getElementById('select');
  text_val.focus(); // Focus on textarea 
  text_val.select();// Select all text  
  document.execCommand("Copy");
  document.getElementById('select').focus();
}
</script>
<body>
<center>
<font face=courier new size=5>Grab Domain by Date<br><font size="3">Mengambil Domain Sekaligus Pada Waktu Yang di Tentukan</font><font size="3"><hr>
<form id="myForm" method="post">
  <input type="date" name="tanggal" required="true" value="<?php if(isset($_POST['tanggal'])){echo $_POST['tanggal'];}?>" onchange="submitForm();">
<input type="submit" name="cek" value="Check">
</form>

<script>
function submitForm() {
  // Create a hidden input to simulate clicking the 'cek' submit button
  var form = document.getElementById('myForm');

  // Check if our simulated cek input already exists
  var simulatedCekInput = document.getElementById('simulatedCek');
  if (!simulatedCekInput) {
    simulatedCekInput = document.createElement('input');
    simulatedCekInput.type = 'hidden';
    simulatedCekInput.id = 'simulatedCek';
    simulatedCekInput.name = 'cek';
    simulatedCekInput.value = 'Check'; // The value that you want to pass for the 'cek' action
    form.appendChild(simulatedCekInput);
  }

  form.submit(); // Submit the form
}
</script>
<?php
if (isset($_POST['cek'])) {
  ob_implicit_flush();ob_end_flush();
  //echo $_POST['tanggal'];
  if (strpos($_POST['tanggal'], "20") !== false) {
    $tanggal = $_POST['tanggal'];
    $tanggal = str_replace("'", "", $tanggal);
    $tanggal = str_replace('"', '', $tanggal);
    $tanggal = str_replace("$", "", $tanggal);
    $tanggal = str_replace("%", "", $tanggal);
    $tanggal = str_replace("$", "", $tanggal);
    $tanggal = str_replace("*", "", $tanggal);
    $tanggal = str_replace("(", "", $tanggal);
    $tanggal = str_replace(")", "", $tanggal);
    $tanggal = str_replace("^", "", $tanggal);
    $tanggal = str_replace("|", "", $tanggal);
  } elseif (strpos($tanggal, "20") === false) {
    die("Pilih yang abad ke 2 lah hadeh wkwk");
  }
  //$cek = shell_exec("curl -Lsk -A 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4594.160 Safari/537.36' 'https://www.cubdomain.com/domains-registered-by-date/".$tanggal."/1' | grep -e 'href=\"/domains-registered-by-date/".$tanggal."' | ".base64_decode("c2VkIC1yICdzL14uK2hyZWY9IihbXiJdKykiLiskL1wxLyc=")." | sed 's|/domains-registered-by-date/".$tanggal."/||g'");
  //$cek = shell_exec("curl -Lsk -A 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4594.160 Safari/537.36' 'https://www.cubdomain.com/domains-registered-by-date/".$tanggal."/1' | sed 's|/domains-registered-by-date/".$tanggal."/||g'".base64_decode("fCBncmVwIC1lICc8YSBjbGFzcz0icGFnZS1saW5rIiBocmVmPSInIHwgZ3JlcCAtUG8gJyg/PD1ocmVmPSIpW14iXSooPz0iKSc="));
  $barucek = "https://www.cubdomain.com/domains-registered-by-date/".$tanggal."/1";
  $cek = check("https://arilaprilio.com/cgi-bin/cf?".base64_encode($barucek));
  preg_match_all('/>(.*?)<\/a><li class=page-item><a class=page-link href=/i', $cek, $page);
  $page = end($page[1]);
  if (strstr($cek, "404 Page Not Found")) {
    echo "Domain dengan tanggal tersebut tidak ditemukan !";
    die();
  }
  echo '<form method="post">';
  echo 'Page : <select name="page">';
  foreach (range(1, $page) as $pages) {
    echo '<option value="'.$pages.'">'.$pages.'</option>';
  }
  echo "</select><br><br>";
  echo '<input type="hidden" name="tanggal" value="'.$tanggal.'">';
  echo '<input type="hidden" name="cek" value="check">';
  echo '<input type="submit" name="go" value="Gaskan">';
  echo "</form>";
  if (isset($_POST['go'])) {
    if (!is_numeric($_POST['page'])) {
      die("Tolol lo heker");
    } else {
      $page = $_POST['page'];
      $page = str_replace("'", "", $page);
      $page = str_replace('"', "", $page);
      $page = str_replace("^", "", $page);
    }
    if (strpos($_POST['tanggal'], "20") !== false) {
    $tanggal = $_POST['tanggal'];
    $tanggal = str_replace("'", "", $tanggal);
    $tanggal = str_replace('"', '', $tanggal);
    $tanggal = str_replace("$", "", $tanggal);
    $tanggal = str_replace("%", "", $tanggal);
    $tanggal = str_replace("$", "", $tanggal);
    $tanggal = str_replace("*", "", $tanggal);
    $tanggal = str_replace("(", "", $tanggal);
    $tanggal = str_replace(")", "", $tanggal);
    $tanggal = str_replace("^", "", $tanggal);
    $tanggal = str_replace("|", "", $tanggal);
  } elseif (strpos($tanggal, "20") === false) {
    die("kudukudu kuntul");
  }
    echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
    echo "[+] Loading ... ";
    //$ekse = shell_exec("curl -Lsk -A 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4594.160 Safari/537.36' 'https://www.cubdomain.com/domains-registered-by-date/".$tanggal."/".$page."' | ".base64_decode("Z3JlcCAtZSAnaHR0cHM6Ly93d3cuY3ViZG9tYWluLmNvbS9zaXRlLycgfCBzZWQgLXIgJ3MvXi4raHJlZj0iKFteIl0rKSIuKyQvXDEvJyB8IHNlZCAnc3xodHRwczovL3d3dy5jdWJkb21haW4uY29tL3NpdGUvfHxnJw=="));
    $baru = "https://www.cubdomain.com/domains-registered-by-date/".$tanggal."/".$page;
    $cekbaru = check("https://arilaprilio.com/cgi-bin/cf?".base64_encode($baru));
    preg_match_all('/>(.*?)<\/a><\/div><div class="col-md-4 mb-1 mb-md-0">/i', $cekbaru, $hasil);
    echo "( ".count($hasil[1])." sites )   [ <kentod onclick='select_all()'>Copy & Select All</kentod> ]<br>";
    echo "[+] Page : ".htmlspecialchars($page)."<br><br>";
    echo '<textarea style="width: 100%" id="select">';
    foreach ($hasil[1] as $domain) {
      if (strstr($domain, '>')) {
        echo htmlspecialchars(end(explode('>', $domain)))."\n";
      } else {
        echo htmlspecialchars($domain)."\n";
      }
    }
    echo "</textarea>";
    echo "<br><br>[~] Done ";
    echo "</pre>";
  }
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
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>