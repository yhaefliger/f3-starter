<?php
require __DIR__.'/../bootstrap.php';

$f3 = \Base::instance();

$f3->set('DB', $db);

$f3->route('GET /', function($f3){
    echo 'test';
});

$f3->run();