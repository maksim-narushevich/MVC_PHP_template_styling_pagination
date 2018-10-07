<?php

//-- Get subfolder route
$strSubfolderRoute=Config::$strSubfolderRoute;

$router->map('GET',$strSubfolderRoute.'/', 'RouteController#index', 'home');
$router->map('GET',$strSubfolderRoute.'/about', 'RouteController#about', 'about');
$router->map('GET',$strSubfolderRoute.'/template/[i:page]?', 'RouteController#template', 'template');
