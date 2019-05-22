<?php 
namespace app\controllers;

class controllers
{

	function controller() 
	{
		echo "<br><p style='color:red'>Подключен Controller</p>";
		$echo = new app\modules\echoView;
		$echo->echoViewStr();
		// return [
		// 	"index" => [
		// 		"1" => $view["index"]
		// 		],
		// ]
	}
}

 ?>