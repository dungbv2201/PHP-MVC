<?php
namespace App\core;

class Application
{
	public $router;

	public function __construct()
	{
		$this->router = Router::singleton();
	}

	public function run(){
		echo $this->router->resolve();
	}
}
