<?php 
/**
* 
*/
class CreateHTML 
{
	public $html // в эту переменную записывается готовый html документ
	static $path;// здесь берется путь из глобального массива, который создается в лоадер

	function pathHtml(){
		$arrpath = global $arr_path;
		$this->path = $arrpath['str1.html'];

		// $txt_html = $file_get_contents()

	}

	function parseStrHtml(){
		$strHtml = file_get_contents($this->path);
		echo "$strHtml";
	}

	// функция вывода документа на экран
	function echoHtml(){
		$html = $this->html;
		echo "$html";
	}

}
 ?>