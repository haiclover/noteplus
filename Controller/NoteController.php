<?php

namespace Controller;

use Model\Database;

class NoteController extends Controller{
	private static $db;
	private static $row;
	public function __construct(){
		parent::__construct();
	}
	public static function getDataFromDB($id = null){
		self::$db = new Database();
		$sql = "SELECT * FROM note WHERE id = :id";
		$params = ['id' => htmlentities($id)];
		self::$row = self::$db->select($sql,$params);
	}
	public function check($id = null){
		$this->getDataFromDB($id);
		if( !empty($_POST['password']) ){
			if((md5($_POST['password']) !== self::$row['password'])){
				return $this->view('login',['id'=>$id]);
				die();
			}
			$_SESSION['name'] = self::$row['name'];
			$_SESSION['password'] = self::$row['password'];
			header("Location: /note/index/" . $id);
		}
		else{
			return $this->view('login',['id'=>$id]);
			die();
		}
	}
	public function validate($id = null){
		if( (!isset($_SESSION['password'],$_SESSION['name']) || ($_SESSION['name'] !== self::$row['name']) || ($_SESSION['password'] !== self::$row['password'])) && self::$row['password'] != ''){
			$this->check($id);
			die();
		}
	}
	public function index($id = null){
		$this->getDataFromDB($id);
		$this->validate($id);
		$data = [
				'homepage' => self::baseUrl(),
				'title' => self::$row['name'],
				'content' => self::$row['content'],
				'raw' => $this->baseUrl() . '/note/raw/' . self::$row['id'],
				'download' => $this->baseUrl() . '/note/download/' . self::$row['id'],
				'embed' => $this->baseUrl() . '/note/embed/' . self::$row['id'],
				'print' => $this->baseUrl() . '/note/print/' . self::$row['id'],
			];
		return $this->view('note',$data);
	}
	public function raw($id = null){
		$this->getDataFromDB($id);
		$this->validate($id);
		$data = ['content' => self::$row['content']];
		return $this->view('raw',$data);
	}
	public function download($id = null){
		$this->getDataFromDB($id);
		$this->validate($id);
		$file = __DIR__ . '/../View/uploads/' . self::$row['name'].'.'.self::$row['syntax'];
		$txt = fopen($file, "w") or die("Unable to open file!");
		fwrite($txt, html_entity_decode(self::$row['content']));
		fclose($txt);
		header('Content-Description: File Transfer');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		header("Content-Type: text/plain");
		readfile($file);
		unlink($file);

	}
	public function embed($id = null){
		$this->getDataFromDB($id);
		$this->validate($id);
		$data = [
					'link' => self::$baseUrl() . '/note/index/' . $id
				];
		return $this->view('embed',$data);
	}
	public function print($id = null){
		$this->getDataFromDB($id);
		$this->validate($id);
		$data = [
					'content' => self::$row['content'],
					'link' => self::$baseUrl() . '/note/index/' . $id
				];
		return $this->view('print',$data);
	}
}