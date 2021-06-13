<?php
$index = file_get_contents("/var/task/user/index.html");
eval("?> $index <?php ");
?>