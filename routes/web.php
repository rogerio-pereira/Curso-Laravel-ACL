<?php

Route::group(['prefix' => 'painel'], function(){
    //PostController
    
    //PermissionController
    
    //RolesController
    
    //PainelController
    Route::get('/', 'Painel\PainelController@index');
});

Auth::routes();

Route::get('/', 'SiteController@index');