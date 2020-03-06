<?php


$pages = array(
	'home' => [
		'index' => 'HomeController@index',
		'insert' => 'HomeController@insert',
		'store' => 'HomeController@store',
		'update' => 'HomeController@update',
		'edit' => 'HomeController@edit',
		'delete' => 'HomeController@delete'
	],
	'note' => [
		'index' => 'NoteController@index',
		'raw' => 'NoteController@raw',
		'download' => 'NoteController@download',
		'embed' => 'NoteController@embed',
		'print'  => 'NoteController@print',
		'check' => 'NoteController@check',
	],
);
$page = strtolower($page);

if(!array_key_exists($page, $pages) || !array_key_exists($action, $pages[$page])){
	$page = 'home';
	$action = 'index';
}

require_once 'autoload.php';

$page = explode("@",$pages[$page][$action])[0];
$page = "Controller\\" . ucfirst($page);
$newPage = new $page;

$newPage->$action(isset($id) ? $id : '');

