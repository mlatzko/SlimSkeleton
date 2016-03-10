<?php
/**
 * Routing of the application.
 *
 * @link      https://github.com/mlatzko
 * @copyright Copyright (c) 2015 Mathias Latzko
 * @license   https://opensource.org/licenses/MIT
 */
$config = $app->getContainer()->get('config');
$logger = $app->getContainer()->get('logger');

$app->get('/example', function($request, $response) use ($config, $logger){
    $responseData = array('status' => 'ok', 'config' => $config->get('app'));

    $logger->debug('Example executed.');

    return $response->withJson($responseData, 200);
});
