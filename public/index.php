<?php
require __DIR__.'/../bootstrap.php';

$f3 = \Base::instance();

$f3->set('DB', $db);
$f3->set('DEBUG', abs((int)env('DEBUG', 0)));

$f3->config(__DIR__.'/../config/app.ini');

$f3->route('GET /', function($f3){
    echo 'test';
});

$f3->run();