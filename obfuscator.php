<!DOCTYPE html>
<html lang="en">
<head>
  <title>[+] PHP Obfuscator [+]</title>
<meta name="about" content="PHP Obfuscator Supaya Anti Maling" />
<meta name="author" content="Unknown45" />
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
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
<body>
<font face=courier new size=5>PHP Obfuscator</font><br>
<font face=courier new size=3>Berguna untuk mencegah recode dan mengurangi size file</font><hr>
<div class="input">
<form action="" method="POST">
<textarea rows="9" cols="40" type="text" name="php" placeholder="<?php echo htmlspecialchars('<?php passthru(); ?>');?>">
</textarea>
<br>
<select name="option">

<option>
- Weak Obfuscation
</option>

<option>
- Medium Obfuscation
</option>

<option>
- Strong Obfuscation
</option>

</select>
<br>
<input type="submit" class="asu" name="submit" value="- Submit -" />

<br>

<?php
if (isset($_POST['submit'])) {
$phpcode = $_POST['php'];

if (!empty($phpcode)) {
$option = htmlspecialchars($_POST['option']);
$website = "http://".$_SERVER['HTTP_HOST'];					$file_location = htmlspecialchars($_SERVER['REQUEST_URI']);
$final = strrev(base64_encode(gzdeflate(gzcompress($phpcode))));
$obfuscated_code = $final;

switch ($option) {
case '- Weak Obfuscation':
									echo '
<textarea rows="9" cols="40">
<?php

//Encode by : Unknown45
//Obfuscated by : Unknown45
//Level : Weak
//Tool Online : https://exploits.my.id


$unknown = "ZXZhbCUyOCUyNyUzRiUyNmd0JTNCJTI3Lmd6dW5jb21wcmVzcyUyOGd6aW5mbGF0ZSUyOGJhc2U2NF9kZWNvZGUlMjhzdHJyZXYlMjglMjR1azQ1JTI5JTI5JTI5JTI5JTI5JTNC";

$uk45 = "'.$obfuscated_code.'";
eval(htmlspecialchars_decode(urldecode(base64_decode($unknown))));
exit;
?></textarea>
';

break;
case '- Medium Obfuscation':
$obfuscate_medium_level = strrev(base64_encode(gzdeflate(gzdeflate(gzcompress($phpcode)))));

echo '<textarea rows="9" cols="40">
<?php

//Encode by : Unknown45
//Obfuscated by : Unknown45
//Level : Medium
//Tool Online : https://exploits.my.id

$unknown = "ZXZhbCUyOCUyNyUzRiUyNmd0JTNCJTI3Lmd6dW5jb21wcmVzcyUyOGd6aW5mbGF0ZSUyOGd6aW5mbGF0ZSUyOGJhc2U2NF9kZWNvZGUlMjhzdHJyZXYlMjglMjR1azQ1JTI5JTI5JTI5JTI5JTI5JTI5JTNC";

$uk45 = "'.$obfuscate_medium_level.'";
eval(htmlspecialchars_decode(urldecode(base64_decode($unknown))));
exit;
?>
</textarea>
';

break;
case '- Strong Obfuscation':
$obfuscate_high_level = strrev(base64_encode(gzdeflate(gzdeflate(gzdeflate(gzcompress(gzcompress($phpcode)))))));

echo '<textarea rows="9" cols="40">
<?php

//Encode by : Unknown45
//Obfuscated by : Unknown45
//Level : Strong
//Tool Online : https://exploits.my.id

$unknown = "ZXZhbCUyOCUyNnF1b3QlM0IlM0YlMjZndCUzQiUyNnF1b3QlM0IuZ3p1bmNvbXByZXNzJTI4Z3p1bmNvbXByZXNzJTI4Z3ppbmZsYXRlJTI4Z3ppbmZsYXRlJTI4Z3ppbmZsYXRlJTI4YmFzZTY0X2RlY29kZSUyOHN0cnJldiUyOCUyNHVrNDUlMjklMjklMjklMjklMjklMjklMjklMjklM0I=";
$uk45 = "'.$obfuscate_high_level.'";
eval(htmlspecialchars_decode(urldecode(base64_decode($unknown))));
exit;
?></textarea>
';

break;
} 
}
}
?>
</form>
</div>

</body>
</html>
<html><center>
<center><hr><font size=3>Unknown45 - 2021</font>
