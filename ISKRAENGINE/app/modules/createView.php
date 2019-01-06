<?php 
// namespace app\modules;
// use app;
/**
 * 
 */
class createView
{
	
	public static $arr_view_mod;
	// 
	function echoViewStr() 
	{
		self::$arr_view_mod = controllers::$arr_view;
		echo "<br><p style='color:#3f45af'>Отображение из module  под управлением Controller<br> массив файлов отображения страницы - </p>";
		var_dump(self::$arr_view_mod);
		foreach ($variable as $key => $value) {
			# code...
		}
	}
	
}
// $cont = new controllers;
// $cont->constant();
 ?>