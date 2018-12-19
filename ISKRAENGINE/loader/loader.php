<?php 

$className = require_once __DIR__."\className.php";

// открывает файлы, пути описаны в className


// Создает пути каталогов для поиска файлов и классов для автозагрузки

/**
 * 
 */
// class loader 
// {
	
// 	public $arr_files = [];
// 	public $arr_dir;// массив путей, сюда записываются пути каждого каталога, куда переходит
// 	public $path;
// 	public $path_arr;
// 	// const DIR = "../".__DIR__;

// 	function arrPath(){
// 		if ($this->path == NULL) {
// 			# code...
// 			$this->path = DIR;
// 			$this->arrDir();
// 		}else{
// 			foreach ($this->arr_dir as $key => $value) {
// 				# code...
// 				$this->path =$value;
// 				$this->arrDir();
// 			}
// 		}
// 	}

// 	function classPath(){
// 		var_dump($this->arr_dir);
// 		if($this->arr_dir == NULL){
// 			$this->arrPath();
// 		}
// 		// if($this->arr_dir){
// 		// 	$this->arrPath();
// 		// 	$this->arrPath();
// 		// }

// 		foreach ($this->path_arr as $key => $value) {
// 			# code...

// 			if(filetype($value) == "dir"){
// 				echo "<br><p style='color:#8800aa'>Проверка наличия дирикторий</p><br>";
// 				$this->arrPath();
				
// 				$bool = "true";
// 			}else{
// 				$bool = "false";
// 			}
// 		}
// 		if ($bool == "true") {
// 			# code...
// 			// $this->classPath();
// 		}else{
// 			return;
// 		}
// 		$this->arrPath();
// 		$this->arrPath();
// 		$this->arrPath();
// 		$this->arrPath();
// 		var_dump($this->path_arr);
// 		// return $this->classPath();
// 		echo "<br><p style='color:#f0102a'>boolean</p>";
// 		var_dump($bool);
		
// 	}

// 	function arrDir(){
// 		if($path_arr_dir = scandir($this->path, 1)){
// 			foreach ($path_arr_dir as $key => $value) {
// 				# code...
// 				// создает полный путь к файлам
// 				$path = $this->path."/".$value;
// 				// создает массив всех путей в каталоге
// 				$array[] = $path;
// 				// присваивает массив путей с свойству класса
				
// 				// 
// 				if ($value == "..") {
// 					# code...
// 					break;
// 				}
// 				if (filetype($path) == "file") {
// 					# code...
// 					var_dump($value);
// 					echo "<br><p style='color:#fa00aa'>$value</p><br>";
// 					$this->arr_files[$value] = $path;
					
// 				}elseif(filetype($path) == "dir"& $value!==".."){
// 					echo "<br><p style='color:#ff00fa'>Директория $value</p><br>";
// 					$path_arr[] = $path;
// 					$this->arr_dir = $path_arr;
					
// 				}else{
// 					echo "<br><p style='color:#8800aa'>Не директория не файл</p><br>";
// 					break;
// 				}
// 			}
// 			var_dump($array);
// 			$this->path_arr = $array;
// 			// $this->classPath();
			
// 		}
// 		else{
// 			echo "<br><p style='color:#f0102a'>Конец директорий</p><br>";
// 			return;
// 		}	
// 	}
// }
// // 
// (new loader)->classPath();


// изначально входящий массив в знначении которого находится директория каталог откуда начинает работать функция
$arr_path = [DIR];

// функция построения массива краты файлов движка. Создает массив из имен файлов, в соответствии с их названиями классов, и путей нахождения данных файлов
function fileMap($arr_path){	
	$bool = false;
	// разбивает массив на отдельные составляющие адреса, с которыми работает дальше программа
	foreach ($arr_path as $key => $value1) {
		# code...
		// var_dump($value1);
		// проверяет является ли указанный путь директорией

		if (is_dir($value1)) {			
			// если является то сканирует данную дирректорию на наличие файлов, и получает результат в виде массива с именами файлов и папок
			$arr_path_dir = scandir($value1);
			// дальше работает с каждым именем отдельно
			foreach ($arr_path_dir as $key => $value2) {
				# code...
				// убирает точки из массива
				if ($value2 !== ".." and $value2 !== ".") {
					
					// создает полный адрес нахождения файла или папки с данным именем 
					$val_dir = $value1."/".$value2;
					// проверяет является ли полученное имя файлом, и сохраняет в макссив под ключем, который является именем файла
					if (is_file($val_dir)) {
						// временный массив $arr_file_dir
						$arr_file_dir[$value2] = $val_dir;
					}else{
						// просто добавляет в массив путь директории
					$arr_file_dir[] = $val_dir;
					// булевый тип, говорит запускать рекурсию этой функции или нет
					$bool = true;
					}
				}
			}
			// если файл то просто перезаписывает во временный массив
		}elseif (is_file($value1)) {
			# code...
			$arr_file_dir[$key] = $value1;
		}
		// конец цикла foreah
	}

	// если bool будет "истина" то функция запускается заного (рекурсия)
	// если "ложь" то выводит получившийся результат в виде массива
	if ($bool === true) {
		# code...
		return fileMap($arr_file_dir);
	}else{
		echo "<p stule='color:red'>Закончились директории</p>";
		return $arr_file_dir;
	}
}

$arr_file_dir = fileMap($arr_path);
$arr_path = $arr_file_dir;

var_dump($arr_file_dir);
// app\controllers\controllers::controller();
 ?>