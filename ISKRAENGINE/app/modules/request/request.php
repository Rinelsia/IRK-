<?php 
// 

/**
* $path - переменная пути страницы, будет записана как название таблицы в бд. откуда будут доставать и добавлять данные;
* $query - переменная значения которые будут вставляться в страницу, запись в бд как название файла текста или видео;
* 
*/
class Request 
{
	public $path;
	public $query;
	
	function request(){
		// 
	}
	function url(){

		// получение значения из адресной строки и разбитие url на элементы (адрес и значение)
		$url = ($_SERVER["REQUEST_URI"] === "/")? "index": (parse_url($_SERVER["REQUEST_URI"]));
		
		if (is_array($url)) {
			// цикл распределения элементов url
			foreach ($url as $key => $value) {
				
				$this->$key = trim($value, "/");
			}

		}else{
			$path = $url;
		}

		echo " url = ";
		var_dump($url);
		
		echo "путь = ";
		var_dump($this->path);

		echo "значение = ";
		var_dump($this->query);

	}
	
	function get(){

	}
	function post(){

	}
}

 ?>