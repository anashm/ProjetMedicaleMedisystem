<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','WelcomeController@welcome');

Route::post('login_user','LoginController@loginUser');



Route::get('/dashboard' , function () {
	
    return view('dashboard.dashboard'); 
})->middleware('anas');

Route::get('/createPatient' , function () {
	
    return view('patient.createPatient'); 
})->middleware('anas');



Route::get('/logOut','LoginController@logOut')->middleware('anas');



Route::get('/getSalles','SalleController@getSalles')->middleware('anas');

Route::post('/getExamenFromSalle','SalleController@getExamenFromSalle')->middleware('anas');

Route::post('/createPatient','PatientController@createPatient')->middleware('anas');

Route::get('/getAllPatients','PatientController@getAllPatients')->middleware('anas');

Route::post('/downloadWordFile','PatientController@downloadWordFile')->middleware('anas');

Route::post('/SaveCompteRendu','PatientController@SaveCompteRendu')->middleware('anas');




Route::get('/configSalle','SalleController@configSalle')->middleware('anas');

Route::post('/createSalle','SalleController@createSalle')->middleware('anas');

Route::post('/updateSalle','SalleController@updateSalle')->middleware('anas');

Route::post('/deleteSalle','SalleController@deleteSalle')->middleware('anas');




Route::get('/configExamen','ExamenController@configExamen')->middleware('anas');

Route::post('/createExamen','ExamenController@createExamen')->middleware('anas');

Route::post('/getInfosFromExamenId','ExamenController@getInfosFromExamenId')->middleware('anas');

Route::post('/updateExamen','ExamenController@updateExamen')->middleware('anas');

Route::post('/deleteExamen','ExamenController@deleteExamen')->middleware('anas');


