<?php 
// namespace app\controllers;

class controllers
{
	public $arr_view;// массив набора файлов view где ключ - имя страницы
	public static $arr_key_url; // преременная названия вкладки страницы, или названия страницы. Является ключем массива подключаемых видов view
	function controller() 
	{
		echo "<br><p style='color:red'>Подключен Controller</p>";
		$echo = new createView;
		$echo->echoViewStr();
		(new parseURL)->globServ();
		$this->viewController();
	}
	public function viewController(){
		self::$arr_key_url = parseURL::$server_url;
		echo "url - ";
		var_dump(self::$arr_key_url);
	}
}

 ?>