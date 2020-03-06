<?php

spl_autoload_register(function($classname){
	$path = explode("\\",$classname);
	$filename = __DIR__ . '/' . $path[0] . '/' . $path[1] . '.php';
	if(file_exists($filename)){
		include($filename);
	}
});
