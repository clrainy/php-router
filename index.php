<?php

require __DIR__ . '/vendor/autoload.php';

use Cdyun\PhpRouter\Route;

Route::get('/test', function () {
    echo 'Hello World';
});
Route::get('/test/(:any)', function($arg) {
    echo 'The slug is: ' . $arg;
});
Route::dispatch();