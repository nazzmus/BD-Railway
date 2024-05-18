<?php
session_start();
require_once '../config/db.php';

function route($uri) {
    $segments = explode('/', trim($uri, '/'));
    $controller = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
    $action = !empty($segments[1]) ? $segments[1] : 'index';
    
    $controllerFile = '../controllers/' . $controller . '.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        if (class_exists($controller)) {
            $controllerObj = new $controller();
            if (method_exists($controllerObj, $action)) {
                $controllerObj->$action();
            } else {
                header("HTTP/1.0 404 Not Found");
                echo "Error: Action not found!";
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Error: Controller class not found!";
        }
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "Error: Controller file not found!";
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
route($uri);
?>

