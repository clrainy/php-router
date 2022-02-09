<?php

require __DIR__ . '/vendor/autoload.php';

use Cdyun\PhpRouter\Route;

Route::get('/tt', function () {
    echo 'Hello World';
});
Route::get('/tt/(:any)', function($slug) {
    echo 'The slug is: ' . $slug;
});
Route::dispatch();