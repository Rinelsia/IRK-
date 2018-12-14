<?php 

$className = require_once __DIR__."\className.php";

// открывает файлы, пути описаны в className


// Создает пути каталогов для поиска файлов и классов для автозагрузки

/**
 * 
 */
class loader 
{
	
	public $arr_files = [];
	public $arr_dir;// массив путей, сюда записываются пути каждого каталога, куда переходит
	public $path;
	public $path_arr;
	// const DIR = "../".__DIR__;

	function arrPath(){
		if ($this->path == NULL) {
			# code...
			$this->path = DIR;
			$this->arrDir();
		}else{
			foreach ($this->arr_dir as $key => $value) {
				# code...
				$this->path =$value;
				$this->arrDir();
			}
		}
	}

	function classPath(){
		var_dump($this->arr_dir);
		if($this->arr_dir == NULL){
			$this->arrPath();
		}
		// if($this->arr_dir){
		// 	$this->arrPath();
		// 	$this->arrPath();
		// }

		foreach ($this->path_arr as $key => $value) {
			# code...

			if(filetype($value) == "dir"){
				echo "<br><p style='color:#8800aa'>Проверка наличия дирикторий</p><br>";
				$this->arrPath();
				
				$bool = "true";
			}else{
				$bool = "false";
			}
		}
		if ($bool == "true") {
			# code...
			// $this->classPath();
		}else{
			return;
		}
		$this->arrPath();
		$this->arrPath();
		var_dump($this->path_arr);
		// return $this->classPath();
		echo "<br><p style='color:#f0102a'>boolean</p>";
		var_dump($bool);
		
	}

	function arrDir(){
		if($path_arr_dir = scandir($this->path, 1)){
			foreach ($path_arr_dir as $key => $value) {
				# code...
				// создает полный путь к файлам
				$path = $this->path."/".$value;
				// создает массив всех путей в каталоге
				$array[] = $path;
				// присваивает массив путей с свойству класса
				$this->path_arr = $array;
				// 
				if ($value == "..") {
					# code...
					break;
				}
				if (filetype($path) == "file") {
					# code...
					var_dump($value);
					echo "<br><p style='color:#fa00aa'>$value</p><br>";
					$this->arr_files[$value] = $path;
					
				}elseif(filetype($path) == "dir"){
					echo "<br><p style='color:#ff00fa'>$value</p><br>";
					$path_arr[] = $path;
					$this->arr_dir = $path_arr;
					
				}else{
					echo "<br><p style='color:#8800aa'>Не директория не файл</p><br>";
					break;
				}
			}
			// $this->classPath();
			
		}
		else{
			echo "<br><p style='color:#f0102a'>Конец директорий</p><br>";
			return;
		}	
	}
}
// 
(new loader)->classPath();
// function Katalog ($kat){

// 	$katalog_dir = scandir($kat, 1);
// 	var_dump($katalog_dir);
// 	foreach ($katalog_dir as $key => $value) {
// 		if($value=='..'){
// 			break;
// 		}else{
// 			$DIR = $kat.'/'.$value;

// 			$path_arr_dir[$value] = $DIR;
			
// 			var_dump(filetype($DIR));
			
			
// 			echo "<br><p style='color:ff1200'>$DIR</p><br>";
// 			var_dump($path_arr_dir);
// 			// if(filetype($DIR) =="file"){
// 			// 	$path_arr_file[$value] = $DIR;
// 			// 	echo "<br><p style='color:aa1200'>тип файла $path_arr_file</p><br>";
// 			// 	var_dump($path_arr_file );
// 			// 	return $path_arr_file;
// 			// }
// 			// elseif(filetype($DIR)=="dir"){
// 			// 	$path_arr[] = $DIR;
// 			// 	echo "<br><p style='color:001200'>$DIR;</p><br>";
// 			// 	return Katalog($DIR);

// 			// }
// 		}

// 	}
// 	return  $path_arr_dir;

// }

// var_dump(Katalog($put));
// function opDir(){
// 	$arr = Katalog()
// 	foreach ($arr as $key => $value) {
// 		Katalog($value);
// 	}
// }



// $classes = spl_autoload_register(
// 	function($class_name){
// 		echo "<p style='color:ff1200'>$class_name</p>";
// 	}

// );
// $cont = new controllers;
// foreach ($className as $key => $value) {
// 	# code...
// 	include_once $value;
// }
// app\controllers\controllers::controller();
 ?>