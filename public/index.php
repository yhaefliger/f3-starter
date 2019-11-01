<?php
require __DIR__.'/../bootstrap.php';

$f3 = \Base::instance();

$f3->set('BASE_DIR', __DIR__.'/../');

$f3->set('DB', $db);
$f3->set('DEBUG', abs((int)env('DEBUG', 0)));
$f3->set('BASE_URL', env('BASE_URL', 'http://localhost'));


$f3->config($f3->get('BASE_DIR').'/config/app.ini', true);
$f3->config($f3->get('BASE_DIR').'/config/routes.ini');

$f3->run();