<?php
/**
 * General overwrites of default handler of Slim3.
 *
 * @link      https://github.com/mlatzko
 * @copyright Copyright (c) 2015 Mathias Latzko
 * @license   https://opensource.org/licenses/MIT
 */
ini_set('html_errors', 0);

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// errorHandler changed to return always JSON
// -----------------------------------------------------------------------------
$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($c) {
        $response     = $container['response'];
        $responseData = array(
            'status'  => 'error',
            'content' => $exception->getMessage(),
            'trace'   => explode("\n", $exception->getTraceAsString())
        );

        return $response
            ->withJson($responseData, 500);
    };
};

// -----------------------------------------------------------------------------
// NotFoundHandler changed to return always JSON
// -----------------------------------------------------------------------------
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        $response     = $container['response'];
        $responseData = array(
            'status'  => 'error',
            'content' => 'Route not found.'
        );

        return $response
            ->withJson($responseData, 404);
    };
};

// -----------------------------------------------------------------------------
// NotAllowedHandler changed to return always JSON
// -----------------------------------------------------------------------------
$container['notAllowedHandler'] = function ($container) {
    return function ($request, $response, $methods) use ($container) {
        $response     = $container['response'];
        $responseData = array(
            'status'  => 'error',
            'content' => 'Method not allowed. Allowed methods: ' . implode(', ', $methods),
        );

        return $response
            ->withHeader('Allow', implode(', ', $methods))
            ->withJson($responseData, 405);
    };
};