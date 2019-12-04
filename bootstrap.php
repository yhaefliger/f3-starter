<?php
require __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dsn = sprintf('mysql:dbname=%s;port=%s;host=%s', env('DB_DATABASE', 'f3'), env('DB_PORT', '3306'), env('DB_HOST', '127.0.0.1'));
$db = new DB\SQL($dsn, env('DB_USERNAME', 'root'), env('DB_PASSWORD', ''));