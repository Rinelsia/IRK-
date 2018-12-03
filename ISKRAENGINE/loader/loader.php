<?php 
echo "<br> открыт loader";
$className = require_once __DIR__."\className.php";
var_dump(__DIR__);
echo "<br><b>$className</b>";
var_dump($className);
 ?>