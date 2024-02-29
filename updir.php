<html>
<head>
<title>[+] Upload Path Finder [+]</title>
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
</style>
<center>
<font face=courier new size=5>Upload Path Finder</font><br>
<font size=3>Berguna untuk mencari upload directory<hr>
<form method="post">
<font face=courier new>Target<br></font> <input type="text" class="area" name="url" size="60" height="10" placeholder="http://google.com" style="margin: 5px auto; padding-left: 5px;" required><br>
<input type="submit" name="go" value="Lock Target"><br><br>
<font size=2>ada saran directory ? <a href="https://exploits.my.id/comment.html" target="_blank"><font size=2 color=yellow>comment disini</font></a></font>
</form>
<?php
@error_reporting(0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
@ini_set('log_errors',0);
$pages = array('/files/','/file/','/upload/','/uploaded/','/gallery/','/user_files/','/download/','/photo/','/photos/','/up/','/upfile/','/uploaded_files/','/images/','/image/','/img/','/csv/','/uploads/','/Upload/','/Uploads/','/testimonial/','/_upload/','/admin/','/resume/','/file_upload/','/banner/','/banners/','/slider/','/sliders/','/main_img/','/upload_image/','/upload_images/','/upload_file/','/upload_files/','/admuploads/','/admupload/','/siteimages/','/PDF/','/media_library/','/portofolio/','/reviewimage/','/upload_files/','/upload_file/','/doc/','/document/','/documents/','/Document/','/attachment_file/','/attachment_files/','/attachment/','/media/','/resumes/','/cv/','/CV/','/Resume/','/Resumes/','/serviceimage/','/bannerimage/','/bannerimages/','/journal/','/Journal/','/actions/','/enquiry/','/Enquiry/','/RESUME/','/att/','/attachment/','/attach/','/Attachment/','/upload_cv/','/upload_CV/','/upload_resume/','/upload_resumes/','/admin/uploads/','/admin/upload/','/assets/','/resume_folder/','/resume_file/','/resumes_folder/','/resumes_file/','/applicant_resume/','/images/resume/','/images/resumes/','/images/cv/','/images/csv/','/worduploads/','/videouploads/','/pdfuploads/','/foto/','/foto_alumni/','/foto_siswa/','/foto_user/','/foto_guru/','/poto/','/images/foto/','/img/foto/','/gambar/','/system/uploads/','/public/uploads/','/public/upload/','/storage/files/','/asset/foto_berita','/foto_berita/');
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
    if ($status == "200") {
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