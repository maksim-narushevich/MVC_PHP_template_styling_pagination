<?php
require 'vendor/autoload.php';


$router = new AltoRouter();

//-- Specify our Twig templates location
$loader = new Twig_Loader_Filesystem(__DIR__.'/views/templates');
//-- Instantiate our Twig
$twig = new Twig_Environment($loader);

//-- Add custom extensions
require_once 'extensions/twig_extension.php';


Config::$twig=$twig;

//-- Initialize application routes
require_once 'routes/route.php';

$match = $router->match();
//-- Checking if route match exist
if($match) {
    list( $controller, $action ) = explode( '#', $match['target'] );
    if ( is_callable(array($controller, $action)) ) {
        call_user_func_array(array($controller,$action), array($match['params']));
    }
} else {
  header("HTTP/1.0 404 Not Found");
  require 'views/includes/404.html';
}


