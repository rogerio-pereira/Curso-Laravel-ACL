<?php

Route::group(['prefix' => 'painel'], function(){
    //PostController
    Route::get('posts', 'Painel\PostController@index');
    
    //PermissionController
    
    //RolesController
    
    //PainelController
    Route::get('/', 'Painel\PainelController@index');
});

Auth::routes();

Route::get('/', 'Portal\SiteController@index');