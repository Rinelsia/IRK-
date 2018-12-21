<?php 

$className = require_once __DIR__."\className.php";

// открывает файлы, пути описаны в className


// Создает пути каталогов для поиска файлов и классов для автозагрузки

/**
 * 
 */



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
						$key = rtrim($value2, '.php');
						// временный массив $arr_file_dir
						$arr_file_dir[$key] = $val_dir;
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

// $arr_file_dir = fileMap($arr_path);

// функция автоподключения файлов по имени класса, где имя класса совпадает с именем файла


spl_autoload_register(function($class){
	$arr_path = [DIR];
	echo "<p style='color:#23fd00'>Класс $class</p>";
	$arr_file_dir = fileMap($arr_path);

	echo "<p style='color:#23ff00'>Карта классов $arr_file_dir[$class]</p>";
	var_dump($arr_file_dir);
	include_once $arr_file_dir[$class];
});

// var_dump($arr_file_dir);
(new controllers)->controller();
// app\controllers\controller::controller();
 ?>