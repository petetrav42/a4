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
Route::get('/fish/view/{id}', 'AquariumController@fishDetails');
Route::get('/fish/add/{id}', 'AquariumController@addFish');
Route::post('/fish/add', 'AquariumController@saveFish');
Route::get('/fish/edit/{id}', 'AquariumController@editFish');
Route::post('/fish/edit', 'AquariumController@updateFish');
Route::post('/fish/delete/{id}', 'AquariumController@deleteFish');


//Route::get('/backToAquarium', 'AquariumController@backToAquarium');


//Coral Routes
Route::get('/coral/view/{id}', 'AquariumController@coralDetails');
Route::get('/coral/add/{id}', 'AquariumController@addCoral');
Route::post('/coral/add', 'AquariumController@saveCoral');
Route::get('/coral/edit/{id}', 'AquariumController@editCoral');
Route::post('/coral/edit', 'AquariumController@updateCoral');
Route::post('/coral/delete/{id}', 'AquariumController@deleteCoral');


//Dev logger
if(config('app.env') == 'local'){
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}