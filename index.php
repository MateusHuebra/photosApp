<?php

spl_autoload_register(function ($class_name) {
    require str_replace('\\', '/', $class_name).'.php';
});

$requestUri = explode('/', $_SERVER['REQUEST_URI']);
$className = 'Controller\\'.ucfirst($requestUri[2]);
if(isset($requestUri[3])) {
	$methodName = $requestUri[3];
} else {
	$methodName = 'index';
}

//print_r(class_exists($className));
//die();

if(!file_exists(str_replace('\\', '/', $className).'.php') || !in_array($methodName, get_class_methods($className))) {
	$className = 'Controller\\PageNotFound';
	$methodName = 'index';
}

$connection = new Dao\Connection();

$controller = new $className();
$controller->$methodName();