<?php
declare(strict_types=1);

require "../bootstrap.php";
use Src\Controller\FibonacciController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
$components = parse_url($_SERVER['QUERY_STRING']);
parse_str($components['path'], $params);

if ($uri[1] !== 'fibonacci') {
    header("HTTP/1.1 404 Not Found");
    exit();
} elseif (!isset($params['fibonacciNumber']) || !preg_match('/^\d+$/', $params['fibonacciNumber'])) {
    header("HTTP/1.1 400 Bad Request");
    echo("Invalid input parameter");
    exit();
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

$controller = new FibonacciController($requestMethod, (int)$params['fibonacciNumber']);
$controller->processRequest();
