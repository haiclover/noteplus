<?php
if(!preg_match('/assets/i', $_SERVER['REQUEST_URI'])){
	$path = ltrim($_SERVER['REQUEST_URI'], '/');
	if($path == ""){
		$page = 'home';
		$action = 'index';
		$id = '';
	}
	else{
		$elements = explode('/', $path);
		if(count($elements) > 0){
			$page = $elements[0];
			$action = $elements[1];
			if(count($elements) > 2){
				$id = $elements[2];
			}
		}
	}
	// if(!empty($_GET['page'])){
	// 	$page = strtolower($_GET['page']);
	// 	if (!empty($_GET['action'])) {
	// 	    $action = strtolower($_GET['action']);
	// 	} 
	// 	else {
	// 		$action = 'index';
	// 	}
	// }
	// else{
	// 	$page = 'home';
	// 	$action = 'index';
	// }
	require_once 'route.php';
}
else{
	// echo $_SERVER['REQUEST_URI'];
	header("Location: /View" . $_SERVER['REQUEST_URI']);
}
