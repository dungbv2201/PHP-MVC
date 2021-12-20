<?php
/** @var $app */

use App\controllers\HomeController;
use App\controllers\ProductController;
use App\core\facades\Route;

//$app->router->get('/', [HomeController::class, 'index']);
//$app->router->get('/products', [ProductController::class, 'index']);
//$app->router->get('/contact', function(){
//	echo "Contact";
//});
Route::get('/',[HomeController::class,'index']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/contact', function(){
	return "Contact Page";
});
