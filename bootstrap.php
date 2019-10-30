<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

$dsn = sprintf('mysql:dbname=%s;port=%s;host=%s', $getenv('DB_NAME'), $getenv('DB_PORT'), $getenv('DB_HOST'));
$db = new DB\SQL($dsn, $getenv('DB_USER'), $getenv('DB_PASS'));
