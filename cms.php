<html>
<head>
<title>[+] Mass CMS Scanner [+]</title>
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 95%;
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
  background: ##1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}
</style>
<center>
<font new size=5>Mass CMS Scanner<br></font><font>mencari cms yang di gunakan target<hr>
<form method="POST">
<textarea name="site" cols="50" rows="10"></textarea><br>
<input style="width: 300px;" type="submit" class="asu" name="submit" value="Scan CMS">
</form>
</center>
<?php
if (isset($_POST['submit'])) {
	ob_implicit_flush();ob_end_flush();
	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	$list = explode("\r\n", $_POST['site']);
	if (empty($_POST['site'])) {
		die("Hadeh ente wkwk");
	} elseif (count($list) > 1000) {
		die("Maximal persubmit hanya 1000 web !");
	}
	echo "[+] Loading ... ( ".count($list)." sites )<br><br>";
	foreach ($list as $web) {
		$wb = $web;
		if (empty($web)) {
			continue;
		}
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $web);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$output = curl_exec($ch);
		curl_close($ch);
		if(preg_match('/\/wp-content\/|\/wp-includes\/|\/xmlrpc.php/',$output)) {
			echo $wb." - Wordpress\n";
		}
		elseif(preg_match('/<script type=\"text\/javascript\" src=\"\/media\/system\/js\/mootools.js\"><\/script>|Joomla|\/media\/system\/js\/|mootools-core.js|com_content|Joomla!/',$output)) {
			echo $wb." - Joomla\n";
		}
		elseif(preg_match('/\/faq.php\/vb|\/clientscript\/|vBulletin|vbulletin/',$output)) {
			echo $wb." - vBulletin\n";
		}
		elseif(preg_match('/Drupal|drupal|sites\/all|drupal.org/',$output)) {
			echo $wb." - Drupal\n";
    	}
		elseif(preg_match('/\/skin\/frontend\/base\/default\/|\/\/magentocore.net\/mage\/mage.js|\/webforms\/index\/index\/|\/customer\/account\/login/',$output)) {
			echo $wb." - Magento\n";
    	}
		elseif(preg_match('/route=product|OpenCart|route=common|catalog\/view\/theme/',$output)) {
			echo $wb." - OpenCart\n";
   		}
		elseif(preg_match('/zcadmin\/login.php|zcadmin|zencart/',$output)) {
			echo $wb." - Zencart\n";
    	}
		elseif(preg_match('/\/collections\/all|Powered by Shopify|\/\/cdn.shopify.com\//',$output)) {
			echo $wb." - Shopify\n";
    	}
		elseif(preg_match('/xenforo|XenForo|uix_sidePane_content/',$output)) {
			echo $wb." - XenForo\n";
    	}
		elseif(preg_match('/semua-agenda.html|foto_banner\/|lokomedia/',$output)) {
			echo $wb." - Lokomedia\n";
    	}
		elseif(preg_match('/typo3|TYPO3|Typo3/',$output)) {
			echo $wb." - Typo3\n";
    	}
		elseif(preg_match('/filemanager.php|filemanager|fileman|\/assets\/global\/plugins\/|\/assets\/plugins\/|\/assets\/public\/plugins\/|\/assets\/private\/plugins\/|\/assets\/admin|\/admin\/plugins\/|assets\/dashboard\//',$output)) {
			echo $wb." - Filemanager Source\n";
    	} 
		elseif(preg_match('/upload.php|admin.php|administrator.php|upload file|input type=\"file\"/',$output)) {
			echo $wb." - Weak Website\n";
    	}
		elseif(preg_match('/porn|blowjob/',$output)) {
			echo $wb." - Bokep\n";
    	}
		elseif(preg_match("/\/feeds\/posts\/default?alt=rss|meta content=\'blogger\' name=\'generator\'/",$output)) {
			echo $wb." - Blogger\n";
    	}
		elseif(preg_match('/Liferay|liferay/',$output)) {
			echo $wb." - Liferay\n";
    	}
		elseif(preg_match('/Wolf|Wolf CMS|\?admin/',$output)) {
			echo $wb." - Wolf CMS\n";
    	}
		elseif(preg_match('/timthumb|\/tim.php|\/thumb.php|\/foto.php/',$output)) {
			echo $wb." - Timthumb\n";
    	}
		elseif(preg_match('/Index of|Last modified/',$output)) {
			echo $wb." - Index Of\n";
    	}
		elseif(preg_match('/mcc.godaddy.com\/park\/|domain has expired|Domain Expired|domain expired|Undermainteance|mcc.godaddy.com|Under Construction|Construction|expired/',$output)) {
			echo $wb." - Expired Site\n";
    	}
		elseif(preg_match('/html|head|body/',$output)) {
			echo $wb." - Normal Web\n";
    	}
   		else{
			echo $wb." - Unknown\n";
		}
	}
	echo "</pre>";
}
?>
<center><hr><small><font size=3>Unknown45 - 2021
