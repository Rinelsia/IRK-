<?php 
namespace app\controllers;
use app;
class controllers
{

	function controller() 
	{
		echo "<br><p style='color:red'>Подключен Controller</p>";
		$echo = new app\modules\echoView;
		$echo->echoViewStr();
	}
}

 ?>