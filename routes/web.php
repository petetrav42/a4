<?php


Route::get('/aquarium', 'AquariumController@aquarium');

Route::any('/aquarium/{n?}', 'AquariumController@aquariumDetails');

Auth::routes();

Route::get('/', 'HomeController@index');



if(config('app.env') == 'local'){
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}