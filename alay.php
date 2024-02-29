<html>
<head>
<title>[+] Alay Generator [+]</title>
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
<!--
  function HumanToABG(form){
    var abgteks="";
    var stemp;
    var i,j;
    var acak;
    var aseli=form.aseli.value;
    
    var TabelHuruf="AEGIOSZ";
    var TabelAngka="4361052"; //01234567890
    
    var TabelVokal="AIUEO";
    
    if(aseli.length)
    {
     //modifikasi huruf besar kecil kecil
     if(form.pilihan[0].checked==true)
     {
      for(i=0;i<aseli.length;i++)
    {
      acak = Math.round(2*Math.random())
      if(acak)
         abgteks=abgteks+aseli.charAt(i).toLowerCase();
        else
         abgteks=abgteks+aseli.charAt(i).toUpperCase();
    }
   } 
   else
    abgteks=aseli;
   
   //Modifikasi huruf jadi angka
   var terganti=0;
   stemp="";
   if(form.pilihan[1].checked==true)
     {
      for(i=0;i<aseli.length;i++)
    {
     acak=Math.round(2*Math.random())
     terganti=0;
     if(acak)
     {
       
       for(j=0;j<TabelHuruf.length;j++)
       { 
        if(abgteks.charAt(i).toUpperCase()==TabelHuruf.charAt(j))
        {
          stemp=stemp+TabelAngka.charAt(j);
          
          terganti=1;
          break;
         }
        }
       }      
       
       if(terganti==0) //huruf tidak dapat diganti 
        stemp=stemp+abgteks.charAt(i);
    }
    abgteks=stemp;
   } 
  
  //disingkat-singkat biar pendek
  stemp="";
  if(form.pilihan[2].checked==true)
     {
      for(i=0;i<aseli.length;i++)
    {
     acak=Math.round(2*Math.random())
     terganti=0;
     if(acak)
     {
       
       for(j=0;j<TabelVokal.length;j++)
       { 
        if(aseli.charAt(i).toUpperCase()==TabelVokal.charAt(j))
        {
         if((aseli.charAt(i-1)!=" ")&&(i>0))
         {
           //stemp=stemp+TabelAngka.charAt(j); hilangkan saja
           terganti=1;
          }
          break;
         }
        }
       }      
       
       if(terganti==0) //huruf tidak dapat diganti 
        stemp=stemp+abgteks.charAt(i);
    }
    abgteks=stemp;
   } 
   
   
     form.abg.value=abgteks;
   }
   else
   {
    form.abg.value="Unknown45";
   }
    }
// -->
</script><center>
<font face=courier new size=5>Alay Generator</font><hr>
<form action="ABG_Text.html">
<textarea cols="45" name="aseli" rows="10" style="width: 100%; resize:none">Buset bro parah bener tapi gw sih owh aja</textarea><br><br>
<input name="pilihan" type="checkbox" style="font-family: Staatliches;"> HuRUf bEsAr keCil<br>
<input name="pilihan" type="checkbox" style="font-family: Staatliches;"> P4k3 4n9k4 D0n9<br>
<input name="pilihan" type="checkbox" style="font-family: Staatliches;"> Disngkt-sngkt biar pndk<br><br>
<input onclick="HumanToABG(this.form)" type="button" value="Gas Alayers :v"><br><br>
<textarea cols="45" name="abg" rows="10" style="width: 100%; resize: none" readonly></textarea>
</form>
<center><hr><font size=3>Unknown45 - 2021
</body> </html>
