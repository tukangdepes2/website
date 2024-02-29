<html>
<head>
<title>[+] KCFinder Path Finder [+]</title>
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

a {
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

.asu {
	font-family: courier;
}

nemu {
  color: lightgreen;
}

kgk {
  color: red;
}

ungu {
  color: purple;
}

oke {
  color: green;
}

lima {
  color: yellow;
}
</style>
<center>
<font face=courier new size=5>KCFinder Path Finder</font><br>
<font size=3>berguna untuk mencari directory kcfinder<hr>
<form method="post">
<font face=courier new>Target<br></font> <input type="text" class="area" name="url" size="45" height="10" placeholder="http://google.com" style="margin: 5px auto; padding-left: 5px;" required><br>
<input type="submit" name="go" value="Eksekusi"><br><br>
<font size=2>ada saran directory ? <a href="https://exploits.my.id/comment.html" target="_blank"><font size=2 color=yellow>comment disini</font></a></font>
</form>
<?php
@error_reporting(0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
@ini_set('log_errors',0);
$pages = array('/admin/ckeditor/kcfinder-3.12/upload.php','/admin/ckeditor/kcfinder/upload.php','/admin/ckeditor/plugins/kcfinder-3.12/upload.php','/admin/ckeditor/plugins/kcfinder/upload.php','/admin/core/kcfinder-3.12/upload.php','/admin/core/kcfinder/upload.php','/admin/js/kcfinder-3.12/upload.php','/admin/js/kcfinder/upload.php','/admin/plugin/kcfinder-3.12/upload.php','/admin/plugin/kcfinder/upload.php','/admin/plugins/kcfinder-3.12/upload.php','/admin/plugins/kcfinder/upload.php','/adminpanel/kcfinder-3.12/upload.php','/adminpanel/kcfinder/upload.php','/app/webroot/js/kcfinder-3.12/upload.php','/app/webroot/js/kcfinder/upload.php','/app/webroot/kcfinder-3.12/upload.php','/app/webroot/kcfinder/upload.php','/application/themes/admin/assets/js/kcfinder-3.12/upload.php','/application/themes/admin/assets/js/kcfinder/upload.php','/asset/js_ckeditor/kcfinder-3.12/upload.php','/asset/js_ckeditor/kcfinder/upload.php','/asset/kcfinder-3.12/upload.php','/asset/kcfinder/upload.php','/asset/webadmin/js/kcfinder-3.12/upload.php','/asset/webadmin/js/kcfinder/upload.php','/assets/admin/js/kcfinder-3.12/upload.php','/assets/admin/js/kcfinder/upload.php','/assets/admin/plugins/kcfinder-3.12/upload.php','/assets/admin/plugins/kcfinder/upload.php','/assets/bo/plugin/kcfinder-3.12/upload.php','/assets/bo/plugin/kcfinder/upload.php','/assets/ckeditor/kcfinder-3.12/upload.php','/assets/ckeditor/kcfinder/upload.php','/assets/ckeditor/plugins/kcfinder-3.12/upload.php','/assets/ckeditor/plugins/kcfinder/upload.php','/assets/frontend/js/ckeditor/kcfinder-3.12/upload.php','/assets/frontend/js/ckeditor/kcfinder/upload.php','/assets/frontend/js/kcfinder-3.12/upload.php','/assets/frontend/js/kcfinder/upload.php','/assets/js/ckeditor/kcfinder-3.12/upload.php','/assets/js/ckeditor/kcfinder/upload.php','/assets/js/ckeditor/plugins/kcfinder-3.12/upload.php','/assets/js/ckeditor/plugins/kcfinder/upload.php','/assets/js/kcfinder-3.12/upload.php','/assets/js/kcfinder/upload.php','/assets/js/mylibs/kcfinder-3.12/upload.php','/assets/js/mylibs/kcfinder/upload.php','/assets/js/plugins/ckeditor/plugins/kcfinder-3.12/upload.php','/assets/js/plugins/ckeditor/plugins/kcfinder/upload.php','/assets/js/scripts/kcfinder-3.12/upload.php','/assets/js/scripts/kcfinder/upload.php','/assets/kcfinder-3.12/upload.php','/assets/kcfinder/upload.php','/assets/lib/kcfinder-3.12/upload.php','/assets/lib/kcfinder/upload.php','/assets/libs/kcfinder-3.12/upload.php','/assets/libs/kcfinder/upload.php','/assets/scripts/kcfinder-3.12/upload.php','/assets/scripts/kcfinder/upload.php','/assets/vendor/kcfinder-3.12/upload.php','/assets/vendor/kcfinder/upload.php','/assets/vendors/js/kcfinder-3.12/upload.php','/assets/vendors/js/kcfinder/upload.php','/assets/vendors/kcfinder-3.12/upload.php','/assets/vendors/kcfinder/3.12/upload.php','/assets/vendors/kcfinder/upload.php','/assets/webadmin/js/kcfinder-3.12/upload.php','/assets/webadmin/js/kcfinder/upload.php','/backend/ckeditor/kcfinder-3.12/upload.php','/backend/ckeditor/kcfinder/upload.php','/backend/js/kcfinder-3.12/upload.php','/backend/js/kcfinder/upload.php','/backend/js/plugins/ckeditor/kcfinder-3.12/upload.php','/backend/js/plugins/ckeditor/kcfinder/upload.php','/backend/plugins/kcfinder-3.12/upload.php','/backend/plugins/kcfinder/upload.php','/ckeditor/kcfinder-3.12/upload.php','/ckeditor/kcfinder/upload.php','/ckeditor/plugins/kcfinder-3.12/upload.php','/ckeditor/plugins/kcfinder/upload.php','/component/kcfinder-3.12/upload.php','/components/kcfinder/upload.php','/core/scripts/kcfinder-3.12/upload.php','/core/scripts/kcfinder/upload.php','/core/scripts/wysiwyg/kcfinder-3.12/upload.php','/core/scripts/wysiwyg/kcfinder/upload.php','/inc_admin/plugins/kcfinder-3.12/upload.php','/inc_admin/plugins/kcfinder/upload.php','/js/kcfinder-3.12/upload.php','/js/kcfinder/upload.php','/js/tinymce/kcfinder-3.12/upload.php','/js/tinymce/kcfinder/upload.php','/kcfinder-3.12/upload.php','/kcfinder/upload.php','/lib/kcfinder-3.12/upload.php','/lib/kcfinder/upload.php','/libs/kcfinder-3.12/upload.php','/libs/kcfinder/upload.php','/media/kcfinder-3.12/upload.php','/media/kcfinder/upload.php','/my_cms/public/assets/plugins/ckeditor/kcfinder-3.12/upload.php','/my_cms/public/assets/plugins/ckeditor/kcfinder/upload.php','/packages/assets/js/kcfinder-3.12/upload.php','/packages/assets/js/kcfinder/upload.php','/packages/ckeditor/kcfinder-3.12/upload.php','/packages/ckeditor/kcfinder/upload.php','/packages/ckeditor/plugins/kcfinder-3.12/upload.php','/packages/ckeditor/plugins/kcfinder/upload.php','/packages/js/kcfinder-3.12/upload.php','/packages/js/kcfinder/upload.php','/packages/scripts/kcfinder-3.12/upload.php','/packages/scripts/kcfinder/upload.php','/packages/upload/kcfinder-3.12/upload.php','/packages/upload/kcfinder/upload.php','/panel/kcfinder-3.12/upload.php','/panel/kcfinder/upload.php','/public/ckeditor/kcfinder-3.12/upload.php','/public/ckeditor/kcfinder/upload.php','/public/ckeditor/plugins/kcfinder-3.12/upload.php','/public/ckeditor/plugins/kcfinder/upload.php','/public/js/kcfinder-3.12/upload.php','/public/js/kcfinder/upload.php','/resource/assets/kcfinder-3.12/upload.php','/resource/assets/kcfinder/upload.php','/resource/js/kcfinder-3.12/upload.php','/resource/js/kcfinder/upload.php','/resource/kcfinder-3.12/upload.php','/resource/kcfinder/upload.php','/resources/assets/kcfinder-3.12/upload.php','/resources/assets/kcfinder/upload.php','/resources/js/kcfinder-3.12/upload.php','/resources/js/kcfinder/upload.php','/resources/kcfinder-3.12/upload.php','/resources/kcfinder/upload.php','/resources/vendor/kcfinder-3.12/upload.php','/resources/vendor/kcfinder/upload.php','/scripts/js/kcfinder-3.12/upload.php','/scripts/js/kcfinder/upload.php','/scripts/kcfinder-3.12/upload.php','/scripts/kcfinder/upload.php','/tinymce/kcfinder-3.12/upload.php','/tinymce/kcfinder/upload.php','/upload/kcfinder-3.12/upload.php','/upload/kcfinder/upload.php','/uploads/kcfinder-3.12/upload.php','/uploads/kcfinder/upload.php','/vendor/kcfinder-3.12/upload.php','/vendor/kcfinder/upload.php','/webassist/kcfinder-3.12/upload.php','/webassist/kcfinder/upload.php','/third_party/kcfinder/upload.php','/third_party/kcfinder-3.12/upload.php','/ard/assets/js/kcfinder/upload.php','/editor/kcfinder/upload.php','/assets/grocery_crud/texteditor/ckeditor/kcfinder/upload.php','/assets/text_editor/kcfinder/upload.php','/assets/js/ckeditor12/kcfinder/upload.php','/apps/kcfinder/upload.php','/apps/js/kcfinder/upload.php','/include/libs/kcfinder-2.54/upload.php','/vendors/kcfinder/upload.php','/vendors/js/kcfinder/upload.php','/ThirdParty/kcfinder/upload.php');
if (isset($_POST['go'])) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $url = $_POST['url'];
  if (empty($url)) {
    die("Hadeh ente wkwk");
  }
  foreach ($pages as $page) {
    ob_implicit_flush();ob_end_flush();
    $tod = $url."/".$page;
    $tod = str_replace("///", "/", $tod);
    $tod = str_replace("//", "/", $tod);
    $tod = str_replace("https:/", "https://", $tod);
    $tod = str_replace("http:/", "http://", $tod);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tod);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $ekse = curl_exec($ch);
    //$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if (strpos($ekse, "known error") !== false) {
      echo "[<nemu>Found KCFinder</nemu>] ".$tod."<br>";
    } elseif ($status == "200") {
      echo "[<oke>Found 200 OK</oke>] ".$tod."<br>";
    } elseif ($status == "403") {
      echo "[<ungu>Error 403 Forbidden</ungu>] ".$tod."<br>";
    } elseif ($status == "500") {
      echo "[<lima>Error 500 Internal</lima>] ".$tod."<br>";
    } else {
      echo "[<kgk>Error 404 Not Found</kgk>] ".$tod."<br>";
    }
  }
}
echo "</pre>";
?>
<hr></font><center><font size=3>Unknown45 - 2021