<?php
/**
 * Run Slim3 application.
 *
 * @link      https://github.com/mlatzko/SlimRouter
 * @copyright Copyright (c) 2015 Mathias Latzko
 * @license   https://opensource.org/licenses/MIT
 */
require  __DIR__ . '/../vendor/autoload.php';

// see: https://github.com/slimphp/Slim/blob/3.x/Slim/App.php#L319 - always activated
// because required in Middelware classes.
$settings = require  __DIR__ . '/../bootstrap/settings.php';

$app = new \Slim\App($settings);

// set up overwrites
require __DIR__ . '/../bootstrap/overwrites.php';

// set up dependencies
require __DIR__ . '/../bootstrap/dependencies.php';

// register middleware
require __DIR__ . '/../bootstrap/middleware.php';

// register routes
require __DIR__ . '/../bootstrap/routes.php';

// Run!
$app->run();
