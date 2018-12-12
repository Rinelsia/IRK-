<?php 

$className = require_once __DIR__."\className.php";

// var_dump($path_arr);
// открывает файлы, пути описаны в className
// $opd = opendir(DIR);

// Создает пути каталогов для поиска файлов и классов для автозагрузки
class loader
{
	static $path_file;
	static $path_dir;
	static $path;
	const DIR = "/../".__DIR__;
	// 
	public function classMap() {
		if (($this->$path) == NULL) {
			$this->$path = DIR;
			$this->arrDir();
		}
		// var_dump($this->$path_dir);
		// echo "<br><p style='color:a01200'>classMap прогрузка</p><br>";
		if(isset($this->$path_dir)){
			foreach ($path_dir as $key => $value) {
				# code...
				$this->$path = $value;
				var_dump($this->$path);
				echo "<br><p style='color:f01200'>classMap прогрузка</p><br>";
				$this->arrDir();
			}
		}else{
			return;
		}
		// return $this->classMap();
		// var_dump($this->$path_file);
		
	}
	// сщздает массивы из путей файлов и каталогов
	function arrDir(){
		$path_dir_arr = scandir(($this->$path), 1);
		var_dump($path_dir_arr);
		echo "<br><p style='color:ff1200'>прогрузка arrDir $path_dir</p><br>";
		foreach ($path_dir_arr as $key => $value) {
			// if($value=='..'){
			// 	break;
			// }
			var_dump($this->$path_dir);
			$DIR = $this->$path.'/'.$value;
			var_dump($DIR);
			// if (filetype($DIR) =="file") {
			// 	$this->$path_file =array($value => $DIR);
			// }else{
				$this->$path_dir=array($DIR);
				// var_dump($this->$path_dir);
			// }
		}
		
	}
}


(new loader)->classMap();
// loader::classMap();
// 
// function Katalog ($kat, $path_file=[]){
// 	if(filetype($kat)=="dir"){
// 		$katalog_dir = scandir($kat, 1);
	
	
// 		foreach ($katalog_dir as $key => $value) {

// 			if($value=='..'){
// 				break;
// 			}else{
// 				$DIR = $kat.'/'.$value;
// 				// var_dump(filetype($DIR));
// 				echo "<br><p style='color:ff1200'>$DIR</p><br>";
// 			}

// 			if(filetype($DIR) =="file"){
// 				$path_file[$value] =  $DIR;
				
// 			}elseif(filetype($DIR) =="dir"){
// 				$path_dir[] = $DIR;
// 				Katalog($DIR, $path_file);
// 			}
			
// 		}
// 	}
// 	var_dump($path_file);
// 	return $path_file;
// }


// $path_arr = Katalog($put);
// echo "<p style='color:001200'>Массивы с путями</p>";
// var_dump($path_dir);
// var_dump($path_arr);

// $classes = spl_autoload_register(
// 	function($class_name){
// 		echo "<p style='color:ff1200'>$class_name</p>";
// 	}

// );
$cont = new controllers;
// foreach ($className as $key => $value) {
// 	# code...
// 	include_once $value;
// }
// app\controllers\controllers::controller();
 ?>