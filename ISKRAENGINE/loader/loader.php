<?php 

$className = require_once __DIR__."\className.php";

var_dump($className);
// открывает файлы, пути описаны в className

foreach ($className as $key => $value) {
	# code...
	include_once $value;
}
app\controllers\controllers::controller();
 ?>