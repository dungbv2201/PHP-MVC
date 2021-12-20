<?php

namespace App\core\facades;

use App\core\Router;

class Route
{
	public static function __callStatic($method, $arguments)
	{
		return (self::resolveFacade(Router::class))->$method(...$arguments);
	}

	private static function resolveFacade($class){
		return $class::singleton();
	}
}
