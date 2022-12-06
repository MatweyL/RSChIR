<?php

namespace mvc\core;

class View {
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }
    public function render($title, $vars = []) {
        extract($vars);
        $path = 'mvc/views/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'mvc/views/layouts/'.$this->layout.'.php';
        } else {
            echo 'Вид не найден' . $this->path;
        }

    }

    public static function errorCode($code, $message = ''){
        http_response_code($code);
        $path =  'mvc/views/errors/'.$code.'.php';
        if (file_exists($path)){
            require $path;
        }
        exit;
    }

    public static function json($json, $code){
        header("Content-Type: mvc/json; charset=UTF-8");
        header("Access-Control-Allow-Origin: *");
        http_response_code($code);
        require 'mvc/views/json.php';
    }

    public function redirect($url){
        header('location: '.$url);
        exit;
    }
}