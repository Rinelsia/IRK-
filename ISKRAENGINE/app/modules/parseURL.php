<?php 
/**
* класс обработки запросов от клиента. 
Обработка урл строки
*/
class parseURL 
{
	
	public $server_url;
	function globServ(){
		// var_dump($_SERVER);
		var_dump($_GET);
		$uri_request = ($_SERVER["REQUEST_URI"] === "/")? "index": $_SERVER["REQUEST_URI"];

		echo "<p style='color:red'>$uri_request</p>";
	}
}
 ?>