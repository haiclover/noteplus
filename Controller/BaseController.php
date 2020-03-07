<?php

namespace Controller;

class BaseController
{
    public function view($file, $arr = array()): bool
    {
        $viewFile = __DIR__ . '/../View/' . $file . '.php';
        if (is_file($viewFile)) {
            $data = extract($arr);
            require_once($viewFile);
            return true;
        } else {
            return false;
        }
        die();
    }
}	
