<?php
require __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$connection = env('DB_CONNECTION');

if($connection == 'mysql' || $connection == 'pgsql'){
    $dsn = sprintf('%s:dbname=%s;port=%s;host=%s', $connection, env('DB_DATABASE', 'f3'), env('DB_PORT', '3306'), env('DB_HOST', '127.0.0.1'));
    $db = new DB\SQL($dsn, env('DB_USERNAME', 'root'), env('DB_PASSWORD', ''));
}elseif($connection == 'sqlite'){
    $db = new DB\SQL(sprintf('sqlite:%s', env('DB_DATABASE', __DIR__.'/database.sqlite')));
}else{
    $db = false;
}
