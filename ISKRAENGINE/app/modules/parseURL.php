<?php 
/**
* 
* Класс обработки запросов от клиента. 
* Обработка урл строки
* Получение значения названия адреса. Не приписывается название сайта(название хоста)
*/
class parseURL 
{
	
	public static $server_url;

	function globServ(){
		$parse_url = ($_SERVER["REQUEST_URI"] === "/")? "index": $_SERVER["REQUEST_URI"];
		self::$server_url = $parse_url;
		echo "<p style='color:red'>$this->server_url</p>";
	}
}
 ?>