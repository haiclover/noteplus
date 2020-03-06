<?php

namespace Controller;

class BaseController{
	public function view($file,$arr = array()){
		$viewFile = __DIR__ . '/../View/' . $file . '.php';
		if(is_file($viewFile)){
			// ob_start();
			$data = extract($arr);
			// $content = ob_get_clean();
			require_once($viewFile);
		}
		else{
			header('Location: /error/404.php');
		}
		die();
	}
}	
