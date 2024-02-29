<html>
<body bgcolor="#1e1e1e" text="white">
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 600%;
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
</html>
<link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>

<?php

@ini_set('display_errors', 0);

echo '
<title>
[+] Simple Obfuscator [+]
</title><center>
<font face=courier new size=4>Simple Obfuscator</font><hr>
<form method="POST">
<textarea cols="40" rows="3" name="code">
</textarea>

<br>

<input type="submit" class="asu" name="php" value="PHP">

<input type="submit" class="asu" name="pl" value="PERL">

<input type="submit" class="asu" name="py" value="PYTHON">

<input type="submit" class="asu" name="js" value="JAVASCRIPT">
</form>

<br>
<br>';

$unknownkece=base64_encode($_POST['code']);
if($_POST['php'])
{ echo '<textarea cols="40" rows="6"><?=eval("?>".base64_decode("'.$unknownkece.'"));?>
</textarea>';}

if($_POST['py']){ echo '<textarea cols="40" rows="6">#!/usr/bin/env python
import base64
unknownkece = """'.$unknownkece.'"""
eval(compile(base64.b64decode(unknownkece),"<string>","exec"))</textarea>';}

if($_POST['pl']){ echo '<textarea cols="40" rows="6">#!/usr/bin/perl
use
MIME::Base64;
eval(decode_base64("'.$unknownkece.'"));</textarea>';}

if($_POST['js']){ echo '<textarea cols="40" rows="6">eval(decode64("'.$unknownkece.'"));</textarea>';}

?>
<hr>
<center><hr><font size=3>unknown45 - 2021</font>
