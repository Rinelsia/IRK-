<?php 

$className = require_once __DIR__."\className.php";
$path_arr = [];
// var_dump($path_arr);
// открывает файлы, пути описаны в className
// $opd = opendir(DIR);

// Создает пути каталогов для поиска файлов и классов для автозагрузки
$put = DIR;
// 
function Katalog ($kat, $path_file=[]){
	if(filetype($kat)=="dir"){
		$katalog_dir = scandir($kat, 1);
	
	
		foreach ($katalog_dir as $key => $value) {

			if($value=='..'){
				break;
			}else{
				$DIR = $kat.'/'.$value;
				// var_dump(filetype($DIR));
				echo "<br><p style='color:ff1200'>$DIR</p><br>";
			}

			if(filetype($DIR) =="file"){
				$path_file[$value] =  $DIR;
				
			}elseif(filetype($DIR) =="dir"){
				$path_dir[] = $DIR;
				Katalog($DIR, $path_file);
			}
			
		}
	}
	var_dump($path_file);
	return $path_file;
}


$path_arr = Katalog($put);
echo "<p style='color:001200'>Массивы с путями</p>";
var_dump($path_dir);
var_dump($path_arr);

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