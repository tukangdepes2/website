<html>
<head>
<title>[+] Remove Duplicate [+]</title>
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
  border-color: #ffffff;
  cursor: pointer;
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
<script type="text/javascript">
function doit() {
  var txt = document.getElementById('masterlist').value
  txt = txt.replace(new RegExp( ">", "g" ), "&gt;");
  txt = txt.replace(new RegExp( "<", "g" ), "&lt;");
  var masterarray = txt.split('\n');
  var itemsInArray = masterarray.length;
  var dedupe = new Array();
  i = 0;
  var editedArray = new Array();
  while (i < itemsInArray) {
    masterarray[i]=masterarray[i].replace(/\s+$/, '');
    masterarray[i]=masterarray[i].replace(new RegExp( "\t", "g" ), '&nbsp;&nbsp;&nbsp;&nbsp;') 
    if (!(document.getElementById('kpblanks').checked)) {
      masterarray[i]=masterarray[i].replace(/^\s+/, '');
    }
    else {
      if (masterarray[i].match(/^ +/)) {
        var spc = masterarray[i].match(/^ +/);
        spc[0] = spc[0].replace(/ /g, '&nbsp;');   
        masterarray[i]=masterarray[i].replace(/^\s+/, spc[0]);
      }
    }

    if (document.getElementById('caps').checked) {
      var ulc = masterarray[i].toLowerCase();
    }
    else {
      var ulc = masterarray[i];
    }
    editedArray[ulc] = ulc;
    dedupe[ulc]="0";
    i++;
  }
  i = 0;
  var uniques = new Array();
  for (key in dedupe) {
    if (editedArray[key] != '') {
      uniques.push(editedArray[key]);
    }
    dedupe[key]="dontprint";
    i++;
  }
  if (document.getElementById('sort').checked) {
     uniques.sort(function(x,y){ 
      var a = String(x).toUpperCase(); 
      var b = String(y).toUpperCase(); 
      if (a > b) 
         return 1 
      if (a < b) 
         return -1 
      return 0; 
    });
  }
  var ulen = uniques.length;
  var thelist = uniques.join("\n");
  var rmvd = itemsInArray - ulen;
  document.getElementById('removed').innerHTML=itemsInArray + ' kata asli, ' + rmvd  + ' terhapus, ' + ulen + ' tersisa.';  
  document.getElementById('output').innerHTML=thelist;
  window.location = "#startresults";
}

</script>
<center>
<font face=courier new size=5>Remove Duplicate</font><hr><br>
   <textarea name="masterlist" id="masterlist" rows="11" name="code" cols="68" style="border: 1px solid #093A6B; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; width:100%"></textarea><br><br>
   <input type="checkbox" name="caps" id="caps" value=""><font face=courier new>Abaikan Huruf Kapital ( hasilnya huruf kecil )<br><input type="checkbox" name="kpblanks" id="kpblanks" value=""><font face=courier new>Biarkan kosong di awal kalimat<br> <input type="checkbox" name="sort" id="sort" value=""><font face=courier new>Urutkan hasil (a-z)</font><br><br>
   <a id="ex" onclick="doit()">Submit</a>
    
 <div id="results">
  <a name="startresults"></a>
  <div><b><p name="removed" id="removed"></p></b></div>
  <textarea name="output" id="output" rows="11" name="code" cols="68" style="border: 1px solid #093A6B; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; width:100%" readonly></textarea>
 </div>
</div>
<center><hr><font size=3>Unknown45 - 2021</html>
