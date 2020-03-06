<?php

namespace Controller;

Class Controller extends BaseController{
	public function __construct(){
		session_start();
	}
	public function baseUrl(){
	  return sprintf(
	    "%s://%s",
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME']
	  );
	}
}