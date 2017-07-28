<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persona','personaController@inicio');
Route::post('/persona/post','personaController@post');
Route::get('/persona/ApiListaPersona', 'personaController@apilistapersona');
Route::delete('/persona/{id}/ApiBorrarPersona', 'personaController@apiborrarpersona');
Route::post('/persona/ApiCrearPersona', 'personaController@apicrearpersona');
Route::get('/persona/{id}/ApiGetPersona', 'personaController@apigetpersona');
Route::post('/persona/ApiEditarPersona', 'personaController@apieditarpersona');

Route::get('formulario','StorageController@index');
Route::get('formulario/video','StorageController@video');
Route::get('/formulario/post','StorageController@post');
Route::post('storage/create', 'StorageController@save');
Route::get('/formulario/ApiListaVideo', 'StorageController@apilistavideo');

Route::get('storage/{archivo}', function ($archivo) {
     $public_path = public_path();
     $url = $public_path.'/storage/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
 
});
