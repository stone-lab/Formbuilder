<?php

use Illuminate\Routing\Router;

/* @var Router $router */
$router->group(['prefix' => '/formbuilder'], function () {
    post('send', ['as' => 'front.formbuilder.formbuilder.send', 'uses' => 'FormController@send']);
});
