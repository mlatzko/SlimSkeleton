<?php
/**
 * Routing of the application.
 *
 * @link      https://github.com/mlatzko/SlimRouter
 * @copyright Copyright (c) 2015 Mathias Latzko
 * @license   https://opensource.org/licenses/MIT
 */

$app->get('/example', function($request, $response){
    return $response->withJson(array('status' => 'ok', 'content' => array()), 200);
});
