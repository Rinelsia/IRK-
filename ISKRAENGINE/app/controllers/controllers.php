<?php 
// namespace app\controllers;

class controllers
{

	function controller() 
	{
		echo "<br><p style='color:red'>Подключен Controller</p>";
		$echo = new createView;
		$echo->echoViewStr();
		(new parseURL)->globServ();
	}
}

 ?>