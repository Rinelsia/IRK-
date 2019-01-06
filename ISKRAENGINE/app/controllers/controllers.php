<?php 
// namespace app\controllers;

// $server_url - переменная полученая в modules/parseUrl.php. Имя адреса страницы
// controller() - функция запуска классов для обработки запросов
/*
* Использовать переменные разных типов записи, в массив.
* Здесь имеется ввиду категории массивов
* Одни массивы хранят данные об именах файлов для отображения
* Другие массивы для запуска нужных классов, в зависимости от полученого адреса страницы
* Массив с данными о видах, имен файлов в папке view
* Эти имена файлов в массиве будут являться ключами массива карты сайта, созданная в loader функцией fileMap()
* Запуск базовых классов и переменных
*/

class controllers
{
	public static $arr_view;// массив набора файлов view где ключ - имя страницы
	public static $arr_key_url; // преременная названия вкладки страницы, или названия страницы. Является ключем массива подключаемых видов view
	public static $arr_controller;// Массив сценари отработки сайта

	public function controller() 
	{
		echo "<br><p style='color:red'>Подключен Controller</p>";
		// $this->MapController();
		(new controller)->controllerArr();
		(new parseURL)->globServ();// метод разбора строки адреса
		$this->viewController();
		(new createView)->echoViewStr();

		
	}
	// 
	public function viewController(){
		self::$arr_key_url = parseURL::$server_url;		
		echo "url - ";
		var_dump(self::$arr_key_url);
		$file = self::$arr_view;
		var_dump($file);
		self::$arr_view = self::$arr_controller[self::$arr_key_url];
		// сохранение массива в свойствах моделей создания вида

		echo "<p style='color:#00ab00'> arr_controller - </p>";
		var_dump(self::$arr_controller);
	}

	public function MapController(){
		self::$arr_controller = [
			"index" => $view = [				
				"content" => DIR."app/view/headerView.php"
			]
		];
	}
	
}

 ?>