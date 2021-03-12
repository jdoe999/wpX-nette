<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$admin = new RouteList('Admin');
		$admin[] = new Route('admin/<presenter>/<action>[/<id>]', 'Admin:Homepage:default');
		$router[] = $admin;

		$router = new RouteList;
		$router->addRoute('<presenter>/<action>[/<id>]', 'Front:Homepage:default');
		return $router;
	}
}
