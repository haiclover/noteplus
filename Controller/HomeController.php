<?php

namespace Controller;

use Model\Database;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): bool
    {
        $filename = __DIR__ . '/../View/assets/lang/lang.json';
        $file = fopen($filename, 'r') or die();
        $dataJSON = fread($file, filesize($filename));
        $dataJSON = json_decode($dataJSON);
        fclose($file);
        return $this->view('index', ['languages' => $dataJSON]);
    }

    public function store(): bool
    {
        $content = !empty($_POST['content']) ? $_POST['content'] : null;
        $name = !empty($_POST['name']) ? $_POST['name'] : null;
        $password = !empty($_POST['password']) ? md5($_POST['password']) : '';
        $syntax = !empty($_POST['syntax']) ? $_POST['syntax'] : null;

        if (isset($content, $name, $password, $syntax)) {
            $instance = new Database();
            $query = "INSERT INTO note(name,password,syntax,content) VALUES(:name,:password,:syntax,:content)";
            $params = ['name' => htmlentities($name), 'password' => htmlentities($password), 'syntax' => htmlentities(strtolower($syntax)), 'content' => htmlentities($content)];
            $id = $instance->insert($query, $params);
            $status = 'success';
            $alert = 'Thêm thành công !';
            $link = $this->baseUrl() . '/note/index/' . $id;
            return $this->view('index', ['status' => 'success', 'alert' => $alert, 'link' => $link]);
            die();
        } else {
            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                header("Location: /");
            }
        }
    }

}