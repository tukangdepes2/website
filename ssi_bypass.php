<html>
<head>
<title>[+] CSRF Online [+]</title>
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
<body onload="asuasu()">
<center>
<font face=courier new size=5>SSI Command Bypasser<br><font size=3>Untuk bypass command ssi di litespeed<br><hr>
<textarea style="width: 100%" id="awalan" oninput="asuasu()" class="area"></textarea><br><br>
<textarea style="width: 100%" id="hasil" onclick="this.setSelectionRange(0, this.value.length)" class="area" readonly></textarea><br><br>
<button>Copy</button>
<script type="text/javascript">
function asuasu() {
  var awal = document.getElementById("awalan").value.split(" ").join("${IFS}");
  document.getElementById("hasil").value = awal;
  }
  document.querySelector("button").onclick = function(){
    document.getElementById("hasil").select();
    document.execCommand('copy');
}
</script>
<hr><font size="3">Unknown45 - 2021