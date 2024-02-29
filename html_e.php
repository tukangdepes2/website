<html>
<head>
<title>[+] HTML Encrypt [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<script language="JavaScript"> function doencrypt(theform) { if (theform.code.value == "") { alert("No HTML code to encrypt"); return false; } else { enctext=encrypt(theform.code.value); codetocopy="<Script Language='Javascript'>\n"; codetocopy+="<!-- Encrypted by Unknown45 -->\n"; codetocopy+="<!-- Tools : https://exploits.my.id/ -->\n"; codetocopy+="document.write(unescape('"+enctext+"'));\n"; codetocopy+="//-->\n"; codetocopy+="</Script\>"; theform.ecode.value=codetocopy; theform.sac.disabled = false; } return false; } function sandc(thisform) { thisform.ecode.focus(); thisform.ecode.select(); copytext=thisform.ecode.createTextRange(); copytext.execCommand("Copy"); alert("Copied the Encrypted HTML Code to clipboard, you may now paste this into your website"); } function encrypt(tx) { var hex=''; var i; for (i=0; i<tx.length; i++) { hex += '%'+hexfromdec(tx.charCodeAt(i)) } return hex; } function hexfromdec(num) { if (num > 65535) { return ("err!") } first = Math.round(num/4096 - .5); temp1 = num - first * 4096; second = Math.round(temp1/256 -.5); temp2 = temp1 - second * 256; third = Math.round(temp2/16 - .5); fourth = temp2 - third * 16; return (""+getletter(third)+getletter(fourth)); } function getletter(num) { if (num < 10) { return num; } else { if (num == 10) { return "A" } if (num == 11) { return "B" } if (num == 12) { return "C" } if (num == 13) { return "D" } if (num == 14) { return "E" } if (num == 15) { return "F" } } } </script>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
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
<form name="pageform" onsubmit="return doencrypt(this);"> 
	<p><font size="2"><table border="0" style="border-collapse: collapse" width="100%"> 
		<tr> <td width="956" height="91" valign="top"> <table style="border-collapse: collapse" width="100%" height="76" class="tooltop"> 
			<tr> <td> <table border="0" style="border-collapse: collapse" width="100%" cellspacing="5"> <tr> <td height="28" width="924">
				<b><font size="2"><center><font face=courier new size=4>HTML Encrypter</font></b><br></td> </tr> <tr> <td width="931" height="21">
				 <textarea rows="11" name="code" cols="68" style="border: 1px solid #093A6B; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; width:100%"></textarea>
				</td> </tr> <tr> <td width="931" height="21"> <center>
					<input type="submit" onClick="doencrypt(pageform);" value="Encrypt" class="asu"></td> </tr> </table> </td> </tr> </table> </td> </tr> <tr> <td width="956"> &nbsp;</td> </tr> <tr> <td width="956"> <textarea rows="11" readonly name="ecode" cols="68" class="toolbot" style="width:100%"></textarea></td> </tr> <tr> <td width="956"> <center><input type="button" value="Select And Copy" onClick="sandc(pageform);" name="sac" disabled="true" class="asu"></td> </tr> </table> </form></td> </tr> </table> </td> <td width="7">&nbsp;</td> </tr> <tr> <td width="7"> </td> <td></td> <td width="7"> </td> </tr> </table> </td> </tr> </table> </td> <td width="7">&nbsp;</td> </tr> <tr> <td width="7"> </td> <td></td> <td width="7"> </td> </tr> </table> </td> </tr><center><hr><font face=courier size=3>Unknown45 - 2021</body> </html>
