<html>
<head>
<title>[+] Port Scanner [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
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
</style>
<font face=courier new size=5>Port Scanner<br><font size="3">Atau Lebih Dikenal Dengan Istilah Nmap<hr>
<form action="" method="post" >
<font size=2 face=arial>Url : </font><input type="text" class="input" name="port" size=30 placeholder="www.site.com">
<button type="submit" class="asu">Scan</button>
</form>

<?php

	error_reporting(0);
$x = htmlspecialchars($_POST["port"]);
if(!empty($_POST['port'])) {    
    //daftar port yang di scan
    $ports = array(20, 21, 22, 23, 25, 53, 80, 443, 110, 1433, 3306);
    
    $results = array();
    foreach($ports as $port) {
        if($pf = @fsockopen($_POST['port'], $port, $err, $err_string, 1)) {
            $results[$port] = true;
            fclose($pf);
        } else {
            $results[$port] = false;
        }
    }
echo "Site : " . $x . "<br><br>";
    foreach($results as $port=>$val)    {
        $prot = getservbyport($port,"tcp");
                echo "Port $port ( $prot ) - ";
        if($val) {
            echo "OK<br>";
        }
        else {
			echo "Inaccessible<br>";
        }
    }
}
?>
</div>
<html>
<center><hr><font size=3>Unknown45 - 2021</font>
