<?php
//phpinfo();
$waktu = $_SERVER['REQUEST_TIME'];
$ipnya = $_SERVER['REMOTE_ADDR'];
if (!file_exists("/tmp/tempku")) {
	mkdir("/tmp/tempku");
}
if (!file_exists("/tmp/tempku/ip")) {
	mkdir("/tmp/tempku/ip");
}

if (!empty($_POST)) {
	if (file_exists("/tmp/tempku/ip/".$ipnya.".txt")) {
		$cek = @file_get_contents("/tmp/tempku/ip/".$ipnya.".txt");
		if ($cek > $waktu) {
			$tunggu = $cek - $waktu;
			echo '<head>
  <title>[!] Sabar Ya bre - '.$tunggu.' Detik [!]</title>
  <meta name="description" content="sabar ya, untuk menghindari overload server.">
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
  <table width="100%" height="100%">
    <td>
      <center>
        <i>
          <h1>Sabar ya bre, Tunggu '.$tunggu.' Detik lagi</h1>
          <br>
          <font face="courier">Akhir akhir ini akses server terasa berat dan ternyata penyebabnya adalah ada seseorang yang menggunakan tool atau plugin yang melakukan multi-request ke layanan ini untuk kepentingan pribadi. Mulai tanggal 15 Juni 2022, setiap <b>submit</b> akan di jeda 5 detik untuk submit berikutnya. </font>
          <br>
          <br>
          <small>Redirecting to tools ...</small>
          <br>
          <font face=helvetica size=3>
            <br>https://exploits.my.id/ <br>Unknown45 - 2022
      </center>
    </td>
  </table><meta http-equiv="refresh" content="'.$tunggu.'; URL='.$_SERVER['REQUEST_URI'].'">';
  die();
		}
	}
	@file_put_contents("/tmp/tempku/ip/".$ipnya.".txt", $waktu + "5");
}

?>