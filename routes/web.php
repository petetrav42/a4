<?php

//Home page after login
Route::get('/', 'AquariumController@index');

//Auth routes
Auth::routes();

//Aquarium Routes
Route::get('/aquarium/view/{id}', 'AquariumController@aquariumDetails');
Route::get('/aquarium/add/{id}', 'AquariumController@addAquarium');
Route::post('/aquarium/add', 'AquariumController@saveAquarium');
Route::get('/aquarium/edit/{id}', 'AquariumController@editAquarium');
Route::post('/aquarium/edit', 'AquariumController@updateAquarium');
Route::post('/aquarium/delete/{id}', 'AquariumController@deleteAquarium');


//Fish Routes
Route::get('/fish/view/{id}', 'FishController@fishDetails');
Route::get('/fish/add/{id}', 'FishController@addFish');
Route::post('/fish/add', 'FishController@saveFish');
Route::get('/fish/edit/{id}', 'FishController@editFish');
Route::post('/fish/edit', 'FishController@updateFish');
Route::post('/fish/delete/{id}', 'FishController@deleteFish');


//Coral Routes
Route::get('/coral/view/{id}', 'CoralController@coralDetails');
Route::get('/coral/add/{id}', 'CoralController@addCoral');
Route::post('/coral/add', 'CoralController@saveCoral');
Route::get('/coral/edit/{id}', 'CoralController@editCoral');
Route::post('/coral/edit', 'CoralController@updateCoral');
Route::post('/coral/delete/{id}', 'CoralController@deleteCoral');


//Dev logger
if(config('app.env') == 'local'){
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}