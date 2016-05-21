<?php

use Illuminate\Routing\Router;

/* @var Router $router */

$router->group(['prefix' => '/formbuilder'], function (Router $router) {
    get('formbuilder', ['as' => 'admin.formbuilder.formbuilder.index', 'uses' => 'FormbuilderController@index']);
    get('formbuilder/create', ['as' => 'admin.formbuilder.formbuilder.create', 'uses' => 'FormbuilderController@create']);
    post('formbuilder', ['as' => 'admin.formbuilder.formbuilder.store', 'uses' => 'FormbuilderController@store']);
    get('formbuilder/{form}/edit', ['as' => 'admin.formbuilder.formbuilder.edit', 'uses' => 'FormbuilderController@edit']);
    put('formbuilder/{form}/edit', ['as' => 'admin.formbuilder.formbuilder.update', 'uses' => 'FormbuilderController@update']);
    delete('formbuilder/{form}', ['as' => 'admin.formbuilder.formbuilder.destroy', 'uses' => 'FormbuilderController@destroy']);

    get('submission/', ['as' => 'admin.formbuilder.submissions.index', 'uses' => 'SubmissionController@index']);
    get('submission/{form}', ['as' => 'admin.formbuilder.submissions.form', 'uses' => 'SubmissionController@form']);
    delete('submission/{form}', ['as' => 'admin.formbuilder.submissions.destroy', 'uses' => 'SubmissionController@destroy']);
});
