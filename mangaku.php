<?php
session_start();
@error_reporting(0);
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$chapters = $_GET['chapter'];
$download_pdf = $_GET['download'];
if ($download_pdf) {
  if (file_exists("/tmp/tempku/temp_manga/".$chapters."/".$chapters.".zip")) {
    header('Content-disposition: attachment; filename='.$chapters.'.zip');
    header('Content-type: application/zip');
    readfile("/tmp/tempku/temp_manga/".$chapters.'/'.$chapters.".zip");
    //file_get_contents("/tmp/tempku/temp_manga/".$chapters.'/'.$chapters.".zip");
    exit();
  } else {
  exec('xargs -P 0 -n 1 wget -P /tmp/tempku/temp_manga/'.$chapters.'/ < /tmp/tempku/temp_manga/'.$chapters.'.txt');
  exec('cd /tmp/tempku/temp_manga/'.$chapters.' && zip -r '.$chapters.'.zip ./');
  header('Content-disposition: attachment; filename='.$chapters.'.zip');
  header('Content-type: application/zip');
  readfile("/tmp/tempku/temp_manga/".$chapters.'/'.$chapters.".zip");
  //file_get_contents("/tmp/tempku/temp_manga/".$chapters.'/'.$chapters.".zip");
  exit();
}
}
?>
<html>
<head>
<title>[+] Mangaku [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

  /* unvisited link */
a:link {
  color: white;
}

/* visited link */
a:visited {
  color: orange;
}

/* mouse over link */
a:hover {
  color: orange;
}

/* selected link */
a:active {
  color: white;
}

@media only screen and (max-width: 600px) {
  img {
    max-width: 100% !important
  }
}

@media only screen and (max-width: 768px) {
  img {
    max-width: 100% !important
  }
}

img {
  max-width: 100%;
}

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
  float: left;
}
</style>
<script>
function checkGambar() {
  var asu = document.getElementById("myImg").width;
  if (asu < 100) {
    document.getElementById("myImg").style.display = 'none';
  }
}
</script>
<body><center>
<font face=courier new size=5>Mangaku<br><font size="3">Baca dan Download Manga Tanpa Iklan wkwk<hr>
<form method="get">
  <input type="hidden" name="tools" value="mangaku"/>
  <input type="text" name="manga" size="30" height="10" placeholder="Naruto" style="margin: 5px auto; padding-left: 5px;" required><br>
  <input type="submit" value="Cari Manga">
</form><hr>
<font style="display:-moz-inline-stack; display:inline-block; zoom:1; *display:inline; text-align: left;">
<?php
if (file_exists("/tmp/tempku/temp_manga")) {
} else {
  passthru("mkdir /tmp/tempku/temp_manga");
}
$mangas = $_GET['manga'];
$pilih = $_GET['pilihmanga'];
$chapters = $_GET['chapter'];
$download_pdf = $_GET['download'];

$filter = filter_var($mangas, FILTER_SANITIZE_STRING);
$filtera = str_replace("&", "", $filter);
$filterb = str_replace("|", "", $filtera);

$search = exec("curl --ipv4 -Ls https://rest-api.ytryo.my.id/api/mangaku/search?q=".$filterb."");
$actual_link = basename($_SERVER['REQUEST_URI']);
$searchd = json_decode($search);
$mangad = $searchd->mangas;
if (empty($chapters)) {
  if (empty($pilih) && $pilih !== '0') {
    if(isset($mangas)) {
  if (isset($mangad[0]->title)) {
    echo "1. ".$mangad[0]->title."<br>";
  } else {
    echo "Manga Tidak Ditemukan !";
  } if (isset($mangad[1]->title)) {
    echo "2. ".$mangad[1]->title."<br>";
  } if (isset($mangad[2]->title)) {
    echo "3. ".$mangad[2]->title."<br>";
  } if (isset($mangad[3]->title)) {
    echo "4. ".$mangad[3]->title."<br>";
  } if (isset($mangad[4]->title)) {
    echo "5. ".$mangad[4]->title."<br>";
  } if (isset($mangad[5]->title)) {
    echo "6. ".$mangad[5]->title."<br>";
  } if (isset($mangad[6]->title)) {
    echo "7. ".$mangad[6]->title."<br>";
  } if (isset($mangad[7]->title)) {
    echo "8. ".$mangad[7]->title."<br>";
  } if (isset($mangad[8]->title)) {
    echo "9. ".$mangad[8]->title."<br>";
  } if (isset($mangad[9]->title)) {
    echo "10. ".$mangad[9]->title."<br>";
  } if (isset($mangad[10]->title)) {
    echo "11. ".$mangad[10]->title."<br>";
  } if (isset($mangad[11]->title)) {
    echo "12. ".$mangad[11]->title."<br>";
  }

  echo '</font><font><br><form method="get">
  <select name="pilihmanga">';
  if (isset($mangad[0]->title)) {
    echo '<option value="0">1</option>';
  }  if (isset($mangad[1]->title)) {
    echo '<option value="1">2</option>';
  } if (isset($mangad[2]->title)) {
    echo '<option value="2">3</option>';
  } if (isset($mangad[3]->title)) {
    echo '<option value="3">4</option>';
  } if (isset($mangad[4]->title)) {
    echo '<option value="4">5</option>';
  } if (isset($mangad[5]->title)) {
    echo '<option value="5">6</option>';
  } if (isset($mangad[6]->title)) {
    echo '<option value="6">7</option>';
  } if (isset($mangad[7]->title)) {
    echo '<option value="7">8</option>';
  } if (isset($mangad[8]->title)) {
    echo '<option value="8">9</option>';
  } if (isset($mangad[9]->title)) {
    echo '<option value="9">10</option>';
  } if (isset($mangad[10]->title)) {
    echo '<option value="10">11</option>';
  } if (isset($mangad[11]->title)) {
    echo '<option value="11">12</option>';
  } 
  echo '</select><input type="hidden" name="tools" value="mangaku"/><input type="hidden" value="'.$filterb.'" name="manga"><br><input type="submit" value="Pilih Manga"></form><hr>';
}
  } else {
    $kentod = $mangad[$pilih]->comic_slug;
    $chapternya = exec("curl --ipv4 -Ls https://rest-api.ytryo.my.id/api/mangaku/chapters?comic_slug=".$kentod."");
    $chap_dec = json_decode($chapternya);
    $list_chap = $chap_dec->chapters;
    $final = str_replace("Â", "", $chap_dec->sipnosis);
    $final = str_replace("â€™", "'", $final);
    $final = str_replace("â€œ", '"', $final);
    $final = str_replace('â€“', '-', $final);
    $final = str_replace('â€', '"', $final);
    echo "</font><font>Judul : <font color=orange>".$chap_dec->title."</font><br>Tipe : <font color=orange>".$chap_dec->type."</font><br>Status : <font color=orange>".$chap_dec->status."</font><br><br>Sinopsis<br><font color=orange>".$final."</font><br><br><img src='".$chap_dec->thumbnail."'><br><br>";
    if (isset($list_chap[0]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[0]->chapter_slug.'">'.$list_chap[0]->title.'</a><br>';
    } if (isset($list_chap[1]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[1]->chapter_slug.'">'.$list_chap[1]->title.'</a><br>';
    } if (isset($list_chap[2]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[2]->chapter_slug.'">'.$list_chap[2]->title.'</a><br>';
    } if (isset($list_chap[3]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[3]->chapter_slug.'">'.$list_chap[3]->title.'</a><br>';
    } if (isset($list_chap[4]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[4]->chapter_slug.'">'.$list_chap[4]->title.'</a><br>';
    } if (isset($list_chap[5]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[5]->chapter_slug.'">'.$list_chap[5]->title.'</a><br>';
    } if (isset($list_chap[6]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[6]->chapter_slug.'">'.$list_chap[6]->title.'</a><br>';
    } if (isset($list_chap[7]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[7]->chapter_slug.'">'.$list_chap[7]->title.'</a><br>';
    } if (isset($list_chap[8]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[8]->chapter_slug.'">'.$list_chap[8]->title.'</a><br>';
    } if (isset($list_chap[9]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[9]->chapter_slug.'">'.$list_chap[9]->title.'</a><br>';
    } if (isset($list_chap[10]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[10]->chapter_slug.'">'.$list_chap[10]->title.'</a><br>';
    } if (isset($list_chap[11]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[11]->chapter_slug.'">'.$list_chap[11]->title.'</a><br>';
    } if (isset($list_chap[12]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[12]->chapter_slug.'">'.$list_chap[12]->title.'</a><br>';
    } if (isset($list_chap[13]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[13]->chapter_slug.'">'.$list_chap[13]->title.'</a><br>';
    } if (isset($list_chap[14]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[14]->chapter_slug.'">'.$list_chap[14]->title.'</a><br>';
    } if (isset($list_chap[15]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[15]->chapter_slug.'">'.$list_chap[15]->title.'</a><br>';
    } if (isset($list_chap[16]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[16]->chapter_slug.'">'.$list_chap[16]->title.'</a><br>';
    } if (isset($list_chap[17]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[17]->chapter_slug.'">'.$list_chap[17]->title.'</a><br>';
    } if (isset($list_chap[18]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[18]->chapter_slug.'">'.$list_chap[18]->title.'</a><br>';
    } if (isset($list_chap[19]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[19]->chapter_slug.'">'.$list_chap[19]->title.'</a><br>';
    } if (isset($list_chap[20]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[20]->chapter_slug.'">'.$list_chap[20]->title.'</a><br>';
    } if (isset($list_chap[21]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[21]->chapter_slug.'">'.$list_chap[21]->title.'</a><br>';
    } if (isset($list_chap[22]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[22]->chapter_slug.'">'.$list_chap[22]->title.'</a><br>';
    } if (isset($list_chap[23]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[23]->chapter_slug.'">'.$list_chap[23]->title.'</a><br>';
    } if (isset($list_chap[24]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[24]->chapter_slug.'">'.$list_chap[24]->title.'</a><br>';
    } if (isset($list_chap[25]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[25]->chapter_slug.'">'.$list_chap[25]->title.'</a><br>';
    } if (isset($list_chap[26]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[26]->chapter_slug.'">'.$list_chap[26]->title.'</a><br>';
    } if (isset($list_chap[27]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[27]->chapter_slug.'">'.$list_chap[27]->title.'</a><br>';
    } if (isset($list_chap[28]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[28]->chapter_slug.'">'.$list_chap[28]->title.'</a><br>';
    } if (isset($list_chap[29]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[29]->chapter_slug.'">'.$list_chap[29]->title.'</a><br>';
    } if (isset($list_chap[30]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[30]->chapter_slug.'">'.$list_chap[30]->title.'</a><br>';
    } if (isset($list_chap[31]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[31]->chapter_slug.'">'.$list_chap[31]->title.'</a><br>';
    } if (isset($list_chap[32]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[32]->chapter_slug.'">'.$list_chap[32]->title.'</a><br>';
    } if (isset($list_chap[33]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[33]->chapter_slug.'">'.$list_chap[33]->title.'</a><br>';
    } if (isset($list_chap[34]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[34]->chapter_slug.'">'.$list_chap[34]->title.'</a><br>';
    } if (isset($list_chap[35]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[35]->chapter_slug.'">'.$list_chap[35]->title.'</a><br>';
    } if (isset($list_chap[36]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[36]->chapter_slug.'">'.$list_chap[36]->title.'</a><br>';
    } if (isset($list_chap[37]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[37]->chapter_slug.'">'.$list_chap[37]->title.'</a><br>';
    } if (isset($list_chap[38]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[38]->chapter_slug.'">'.$list_chap[38]->title.'</a><br>';
    } if (isset($list_chap[39]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[39]->chapter_slug.'">'.$list_chap[39]->title.'</a><br>';
    } if (isset($list_chap[40]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[40]->chapter_slug.'">'.$list_chap[40]->title.'</a><br>';
    } if (isset($list_chap[41]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[41]->chapter_slug.'">'.$list_chap[41]->title.'</a><br>';
    } if (isset($list_chap[42]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[42]->chapter_slug.'">'.$list_chap[42]->title.'</a><br>';
    } if (isset($list_chap[43]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[43]->chapter_slug.'">'.$list_chap[43]->title.'</a><br>';
    } if (isset($list_chap[44]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[44]->chapter_slug.'">'.$list_chap[44]->title.'</a><br>';
    } if (isset($list_chap[45]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[45]->chapter_slug.'">'.$list_chap[45]->title.'</a><br>';
    } if (isset($list_chap[46]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[46]->chapter_slug.'">'.$list_chap[46]->title.'</a><br>';
    } if (isset($list_chap[47]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[47]->chapter_slug.'">'.$list_chap[47]->title.'</a><br>';
    } if (isset($list_chap[48]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[48]->chapter_slug.'">'.$list_chap[48]->title.'</a><br>';
    } if (isset($list_chap[49]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[49]->chapter_slug.'">'.$list_chap[49]->title.'</a><br>';
    } if (isset($list_chap[50]->title)) {
      echo '<a href="'.$actual_link.'&chapter='.$list_chap[50]->chapter_slug.'">'.$list_chap[50]->title.'</a><br>';
    } 
  } echo "<hr>";
} else {
  $showchap = exec("curl --ipv4 -Ls https://rest-api.ytryo.my.id/api/mangaku/show?chapter_slug=".$chapters."");
  $show_dec = json_decode($showchap);
  $imagenya = $show_dec->images;
  if (file_exists("/tmp/tempku/temp_manga/".$chapters.".txt")) {
} else {
  $tempnya = fopen("/tmp/tempku/temp_manga/".$chapters.".txt", "a");
fwrite($tempnya, $imagenya[0]->img."\n");
fwrite($tempnya, $imagenya[1]->img."\n");
fwrite($tempnya, $imagenya[2]->img."\n");
fwrite($tempnya, $imagenya[3]->img."\n");
fwrite($tempnya, $imagenya[4]->img."\n");
fwrite($tempnya, $imagenya[5]->img."\n");
fwrite($tempnya, $imagenya[6]->img."\n");
fwrite($tempnya, $imagenya[7]->img."\n");
fwrite($tempnya, $imagenya[8]->img."\n");
fwrite($tempnya, $imagenya[9]->img."\n");
fwrite($tempnya, $imagenya[10]->img."\n");
fwrite($tempnya, $imagenya[11]->img."\n");
fwrite($tempnya, $imagenya[12]->img."\n");
fwrite($tempnya, $imagenya[13]->img."\n");
fwrite($tempnya, $imagenya[14]->img."\n");
fwrite($tempnya, $imagenya[15]->img."\n");
fwrite($tempnya, $imagenya[16]->img."\n");
fwrite($tempnya, $imagenya[17]->img."\n");
fwrite($tempnya, $imagenya[18]->img."\n");
fwrite($tempnya, $imagenya[19]->img."\n");
fwrite($tempnya, $imagenya[20]->img."\n");
fwrite($tempnya, $imagenya[21]->img."\n");
fwrite($tempnya, $imagenya[22]->img."\n");
fwrite($tempnya, $imagenya[23]->img."\n");
fwrite($tempnya, $imagenya[24]->img."\n");
fwrite($tempnya, $imagenya[25]->img."\n");
fwrite($tempnya, $imagenya[26]->img."\n");
fwrite($tempnya, $imagenya[27]->img."\n");
fwrite($tempnya, $imagenya[28]->img."\n");
fwrite($tempnya, $imagenya[29]->img."\n");
fwrite($tempnya, $imagenya[30]->img."\n");
fwrite($tempnya, $imagenya[31]->img."\n");
fwrite($tempnya, $imagenya[32]->img."\n");
fwrite($tempnya, $imagenya[33]->img."\n");
fwrite($tempnya, $imagenya[34]->img."\n");
fwrite($tempnya, $imagenya[35]->img."\n");
fwrite($tempnya, $imagenya[36]->img."\n");
fwrite($tempnya, $imagenya[37]->img."\n");
fwrite($tempnya, $imagenya[38]->img."\n");
fwrite($tempnya, $imagenya[39]->img."\n");
fwrite($tempnya, $imagenya[40]);
fclose($tempnya);
}
  echo "<br><br></font><font color='orange'>".$show_dec->title."</font><br>";
  if (isset($imagenya[0]->img)) {
     echo "<a href='".$actual_link."&download=gas' target='_blank'>Download Manga</a><br><br>";
   } else {
    echo "Maaf, Manga ini tidak dapat di buka<br>";
   }
  echo "<img src='" . $imagenya[0]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[1]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[2]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[3]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[4]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[5]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[6]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[7]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[8]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[9]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[10]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[11]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[12]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[13]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[14]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[15]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[16]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[17]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[18]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[19]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[20]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[21]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[22]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[23]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[24]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[25]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[26]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[27]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[28]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[29]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[30]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[31]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[32]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[33]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[34]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[35]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[36]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[37]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[38]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[39]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[40]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[41]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[42]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[43]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[44]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[45]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[46]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[47]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[48]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[49]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<img src='" . $imagenya[50]->img . "' onload='checkGambar()' id='myImg' loading='lazy'><br>";
echo "<hr>";
} 
?>
</font><font size="2"><i>Alternative Link : <a href="#" onclick="location.replace('http://mangaku.rf.gd/');"><font color="yellow" onclick="location.href('http://mangaku.rf.gd/');">http://mangaku.rf.gd</a></font></i><br><font size="3">Unknown45 - 2021<br>