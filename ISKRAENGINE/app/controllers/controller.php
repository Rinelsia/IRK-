<?php 
// namespace app\controllers;

class controller
{
	public static $controller;

	function controllerArr() 
	{
		echo "<br><p style='color:red'>Подключен Controller</p>";
		self::$controller = [
			"index"=>[
				"view" => [
					"1"=>DIR."app/view/headerView.php"
				],
				"classes"=>[

				]

			]
		];
		var_dump(self::$controller);
	}
}

 ?>