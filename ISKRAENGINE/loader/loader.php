<?php 

$className = require_once __DIR__."\className.php";

// открывает файлы, пути описаны в className


// Создает пути каталогов для поиска файлов и классов для автозагрузки

/**
 * 
 */
class loader 
{
	
	public $arr_files = [];
	public $arr_dir;// массив путей, сюда записываются пути каждого каталога, куда переходит
	public $path;
	// const DIR = "../".__DIR__;

	function arrPath(){
		if ($this->path == NULL) {
			# code...
			$this->path = DIR;
			$this->arrDir();
		}else{
			foreach ($this->arr_dir as $key => $value) {
				# code...
				$this->path =$value;
				$this->arrDir();
			}
		}
	}

	function classPath(){
		$this->arrPath();
		
		
		// do {
		// 	# code...
		// 	$this->arrPath();
		// 	$n++;
		// } while ($n<2);
		// var_dump($this->path);
		var_dump($this->arr_dir);
		// var_dump($this->arr_files);
		// var_dump($path);
	}

	function arrDir(){
		if($path_arr_dir = scandir($this->path, 1)){
			foreach ($path_arr_dir as $key => $value) {
				# code...
				if (filetype($value) == "file") {
					# code...
					$this->arr_files[$value] = $this->path."/".$value;
				}else{

					$this->arr_dir[] = $this->path."/".$value;

				}
			}
			return "true";
		}
		else{
			return "false";
		}	
	}
}
// 
(new loader)->classPath();
// function Katalog ($kat){

// 	$katalog_dir = scandir($kat, 1);
// 	var_dump($katalog_dir);
// 	foreach ($katalog_dir as $key => $value) {
// 		if($value=='..'){
// 			break;
// 		}else{
// 			$DIR = $kat.'/'.$value;

// 			$path_arr_dir[$value] = $DIR;
			
// 			var_dump(filetype($DIR));
			
			
// 			echo "<br><p style='color:ff1200'>$DIR</p><br>";
// 			var_dump($path_arr_dir);
// 			// if(filetype($DIR) =="file"){
// 			// 	$path_arr_file[$value] = $DIR;
// 			// 	echo "<br><p style='color:aa1200'>тип файла $path_arr_file</p><br>";
// 			// 	var_dump($path_arr_file );
// 			// 	return $path_arr_file;
// 			// }
// 			// elseif(filetype($DIR)=="dir"){
// 			// 	$path_arr[] = $DIR;
// 			// 	echo "<br><p style='color:001200'>$DIR;</p><br>";
// 			// 	return Katalog($DIR);

// 			// }
// 		}

// 	}
// 	return  $path_arr_dir;

// }

// var_dump(Katalog($put));
// function opDir(){
// 	$arr = Katalog()
// 	foreach ($arr as $key => $value) {
// 		Katalog($value);
// 	}
// }



// $classes = spl_autoload_register(
// 	function($class_name){
// 		echo "<p style='color:ff1200'>$class_name</p>";
// 	}

// );
// $cont = new controllers;
// foreach ($className as $key => $value) {
// 	# code...
// 	include_once $value;
// }
// app\controllers\controllers::controller();
 ?>