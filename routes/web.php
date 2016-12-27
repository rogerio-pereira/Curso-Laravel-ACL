<?php

Route::group(['prefix' => 'painel'], function(){
    //PostController
    Route::get('posts', 'Painel\PostController@index');
    
    //PermissionController
    Route::get('permissions', 'Painel\PermissionController@index');
    
    //RolesController
    Route::get('roles', 'Painel\RoleController@index');
    Route::get('role/{id}/permissions', 'Painel\RoleController@permissions');
    
    //RolesController
    Route::get('users', 'Painel\UserController@index');
    
    //PainelController
    Route::get('/', 'Painel\PainelController@index');
});

Auth::routes();

Route::get('/', 'Portal\SiteController@index');