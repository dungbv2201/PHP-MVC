<?php

namespace App\core;

class Router
{
	private $routes = [];
	public static $instance;

	private function __construct()
	{
	}

	public static function singleton(){
		if(!self::$instance){
			self::$instance = new Router();
		}
		return self::$instance;
	}

	public function get($path, $callback){
		$this->addRouter('get', $path, $callback);
		return $this->routes;
	}

	public function post($path, $callback){
		$this->addRouter('post', $path, $callback);
	}

	public function resolve(){
		$path = $this->getPath();
		$method = strtolower($_SERVER['REQUEST_METHOD']);
		$callback = $this->routes[$method][$path] ?? null;
		if(!$callback){
			http_response_code(404);
			echo "not found";
			exit;
		}
		if(is_array($callback)){
			$callback[0] = new $callback[0];
		}
		return  call_user_func($callback);
	}

	private function addRouter($method, $path, $callback){
		$this->routes[$method][$path] = $callback;
	}

	private function getPath(){
		$path = $_SERVER['REQUEST_URI'] ?? '/';
		$position = strpos($path, '?');
		if($position === false){
			return $path;
		}
		return substr($path, 0,$position);
	}
}
