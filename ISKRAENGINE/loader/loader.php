<?php 

$className = require_once __DIR__."\className.php";

var_dump($className);
// открывает файлы, пути описаны в className
$opd = opendir(DIR);
var_dump($opd);
var_dump(dir(DIR));
var_dump(scandir(DIR, 1));
// Создает пути каталогов для поиска файлов и классов для автозагрузки
$put = DIR;
// 
function Katalog ($kat){
	$katalog_dir = scandir($kat, 1);
	foreach ($katalog_dir as $key => $value) {
		if($value=='..'){
			break;
		}else{
			$DIR = $kat.'/'.$value;
			var_dump(filetype($DIR));
			echo "<br><p style='color:ff1200'>$DIR</p><br>";
		}

		// if(filetype($DIR) =="dir"){
		// 	scandir($DIR, 1);
		// }
	}


}
Katalog($put);


$classes = spl_autoload_register(
	function($class_name){
		echo "<p style='color:ff1200'>$class_name</p>";
	}

);
$cont = new controllers;
// foreach ($className as $key => $value) {
// 	# code...
// 	include_once $value;
// }
// app\controllers\controllers::controller();
 ?>