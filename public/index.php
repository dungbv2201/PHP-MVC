<?php
use App\core\Application;

require_once dirname(__DIR__)."/vendor/autoload.php";
require_once dirname(__DIR__)."/routes/web.php";


$app = new Application();

$app->run();
