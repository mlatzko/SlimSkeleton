<?php
/**
 * Here you can define dependencies you required while the application
 * is executed for later usage.
 *
 * @link      https://github.com/mlatzko
 * @copyright Copyright (c) 2015 Mathias Latzko
 * @license   https://opensource.org/licenses/MIT
 */
$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Noodlehaus\Config - https://github.com/hassankhan/config
// -----------------------------------------------------------------------------
$container['config'] = function ($c) {
    $config = Noodlehaus\Config::load(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR. 'config');

    return $config;
};

// -----------------------------------------------------------------------------
// Monolog\Logger - https://github.com/Seldaek/monolog
// -----------------------------------------------------------------------------
$container['logger'] = function ($c) {
    $config = $c->get('config');
    $name   = $config->get('app.name') . ' ' . '(v' . $config->get('app.version') .')';

    $logger = new Monolog\Logger($name);

    $logger->pushHandler(
        new Monolog\Handler\StreamHandler(
            'php://stdout',
            constant('Monolog\Logger::' . strtoupper($config->get('logger.level')))
        )
    );

    return $logger;
};
