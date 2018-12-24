<?php 
// переменная начала отсчета старта времени выполнения скрипта
$time_start = microtime(true);
// 
$className = require_once __DIR__."\className.php";





$dr = dir(DIR);
echo "Дескриптор".$dr->handle;

// Создает пути каталогов для поиска файлов и классов для автозагрузки

// $arr_path - изначально входящий массив в знначении которого находится директория каталог откуда начинает работать функция

// fileMap() - функция построения массива краты файлов движка. Создает массив из имен файлов, в соответствии с их названиями классов, и путей нахождения данных файлов

$arr_path = [DIR];
function fileMap($arr_path){	
	$bool = false;
	// разбивает массив на отдельные составляющие адреса, с которыми работает дальше программа
	foreach ($arr_path as $key => $value1) {
		// проверяет является ли указанный путь директорией

		if (is_dir($value1)) {	// если является то сканирует данную дирректорию на наличие файлов, и получает результат в виде массива с именами файлов и папок
			$arr_path_dir = scandir($value1);
			foreach ($arr_path_dir as $key => $value2) { // дальше работает с каждым именем отдельно
				if ($value2 !== ".." and $value2 !== ".") {  // убирает точки из массива
					$val_dir = $value1."/".$value2; // создает полный адрес нахождения файла или папки с данным именем 
					if (is_file($val_dir)) { // проверяет является ли полученное имя файлом, и сохраняет в макссив под ключем, который является именем файла
						$key = rtrim($value2, '.php');
						$arr_file_dir[$key] = $val_dir;// временный массив $arr_file_dir
					}else{
					$arr_file_dir[] = $val_dir;// просто добавляет в массив путь директории
					$bool = true; // булевый тип, говорит запускать рекурсию этой функции или нет
					}
				}
			}
		}elseif (is_file($value1)) { // если файл то просто перезаписывает во временный массив
			$arr_file_dir[$key] = $value1;
		}
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
// функция автоподключения файлов по имени класса, где имя класса совпадает с именем файла
spl_autoload_register(function($class){
	$arr_path = [DIR];
	echo "<p style='color:#23fd00'>Класс $class</p>";
	$arr_file_dir = fileMap($arr_path);

	echo "<p style='color:#23ff00'>Карта классов $arr_file_dir[$class]</p>";
	var_dump($arr_file_dir);
	include_once $arr_file_dir[$class];
});

(new controllers)->controller();



// Замер времени выполнения скрипта
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "<p>Время выполнения скрипта $time секунд</p>";
 ?>