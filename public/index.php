<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/config.php";
require_once __DIR__ . "/../src/helpers.php";

$app = new Lucas\AjaxInModal\App();
$app->run();
